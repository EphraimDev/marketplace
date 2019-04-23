import { FETCH_THERAPISTS, ADD_TO_CART, REMOVE_ITEM } from "../actions/types";
const image =
  "https://res.cloudinary.com/noi/image/upload/v1556013316/img1.jpg";
const initialState = {
  therapists: [
    {
      id: 1,
      name: "Natheneal Webster",
      location: "Jungle Habitat",
      price: 2000,
      reviews: 30,
      desc: "Animal specialist",
      image_src: image
    },
    {
      id: 2,
      name: "King Kong",
      location: "Jungle Habitat",
      price: 2000,
      reviews: 10,
      desc: "Animal specialist",
      image_src: image
    },
    {
      id: 3,
      name: "Kareem Benzema",
      location: "Jungle Habitat",
      price: 200,
      reviews: 18,
      desc: "Animal specialist",
      image_src: image
    },
    {
      id: 4,
      name: "Lionel Messi",
      location: "Jungle Habitat",
      price: 250,
      reviews: 13,
      desc: "Animal specialist",
      image_src: image
    }
  ],
  therapistDetails: [],
  bookedTherapists: [],
  cart: [],
  modalOpen: false,
  therapistModal: {},
  cartSubTotal: 0,
  cartTax: 0,
  cartTotal: 0
};

export default function therapists(state = initialState, action) {
  switch (action.type) {
    case ADD_TO_CART:
      let addedTherapist = state.therapists.find(
        therapist => therapist.id === action.id
      );
      //check if the action id exists in the addedItems
      let existed_item = state.bookedTherapists.find(
        therapist => action.id === therapist.id
      );
      if (existed_item) {
        return {
          ...state
        };
      } else {
        //calculating the total
        let newTotal = Number(state.cartTotal) + Number(addedTherapist.price);

        return {
          ...state,
          bookedTherapists: [...state.bookedTherapists, addedTherapist],
          cartTotal: newTotal
        };
      }
    case REMOVE_ITEM:
      let itemToRemove = state.bookedTherapists.find(
        therapist => action.id === therapist.id
      );
      let new_bookings = state.bookedTherapists.filter(
        therapist => action.id !== therapist.id
      );

      //calculating the total
      let newTotal = state.cartTotal - itemToRemove.price;
      console.log(itemToRemove);
      return {
        ...state,
        bookedTherapists: new_bookings,
        cartTotal: newTotal
      };
    case FETCH_THERAPISTS:
      return {
        ...state,
        items: action.payload
      };
    default:
      return state;
  }
}
