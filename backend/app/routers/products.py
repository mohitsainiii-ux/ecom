from fastapi import APIRouter, Depends
from sqlalchemy.orm import Session

from app.database.connection import get_db
from app.models.product import Product

router = APIRouter()


@router.get("/")
def get_products(db: Session = Depends(get_db)):
    products = db.query(Product).all()

    return products