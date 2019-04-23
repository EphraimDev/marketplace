import { ADD_TO_CART, REMOVE_ITEM } from "./types";

// Book Therapist
export const addToCart = id => {
  return {
    type: ADD_TO_CART,
    id
  };
};

// Remove from Cart
export const removeItem = id => {
  return {
    type: REMOVE_ITEM,
    id
  };
};
