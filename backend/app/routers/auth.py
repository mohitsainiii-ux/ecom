from fastapi import APIRouter, Depends, HTTPException
from sqlalchemy.orm import Session

from app.database.connection import get_db
from app.models.user import User
from app.schemas.user import UserRegister, UserLogin
from app.services.security import hash_password, verify_password, create_access_token

router = APIRouter()


# =========================
# REGISTER
# =========================

@router.post("/register")
def register(
    user_data: UserRegister,
    db: Session = Depends(get_db)
):

    # Check existing email
    existing_user = (
        db.query(User)
        .filter(User.email == user_data.email)
        .first()
    )

    if existing_user:
        raise HTTPException(
            status_code=400,
            detail="Email already registered"
        )

    # Hash password
    hashed_password = hash_password(user_data.password)

    # Create user
    new_user = User(
        name=user_data.name,
        email=user_data.email,
        password=hashed_password
    )

    db.add(new_user)
    db.commit()
    db.refresh(new_user)

    return {
        "message": "Registration successful",
        "user": {
            "id": new_user.id,
            "name": new_user.name,
            "email": new_user.email
        }
    }


# =========================
# LOGIN
# =========================

@router.post("/login")
def login(
    user_data: UserLogin,
    db: Session = Depends(get_db)
):

    user = (
        db.query(User)
        .filter(User.email == user_data.email)
        .first()
    )

    if not user:
        raise HTTPException(
            status_code=401,
            detail="Invalid email or password"
        )

    if not verify_password(
        user_data.password,
        user.password
    ):
        raise HTTPException(
            status_code=401,
            detail="Invalid email or password"
        )

    token = create_access_token({
        "sub": str(user.id),
        "email": user.email,
        "role": user.role
    })

    return {
    "access_token": token,
    "token_type": "bearer",
    "user": {
        "id": user.id,
        "name": user.name,
        "email": user.email,
        "role": user.role
    }
}