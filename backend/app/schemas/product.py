from pydantic import BaseModel, ConfigDict
from typing import Optional


class ProductCreate(BaseModel):
    name: str
    description: Optional[str] = None
    price: float
    image: Optional[str] = None
    category: Optional[str] = None
    stock: int = 0


class ProductUpdate(BaseModel):
    name: Optional[str] = None
    description: Optional[str] = None
    price: Optional[float] = None
    image: Optional[str] = None
    category: Optional[str] = None
    stock: Optional[int] = None


class ProductResponse(ProductCreate):
    id: int

    model_config = ConfigDict(from_attributes=True)