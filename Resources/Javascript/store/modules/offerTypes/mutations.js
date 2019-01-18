import * as types from "../../mutation-types"
import { initialState } from "./offerTypes"

export default {
    [types.OFFER_TYPES_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.OFFER_TYPES_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.OFFER_TYPES_FETCH_ONE] (state, payload) {
        state.one = payload
    },

    [types.OFFER_TYPES_MAPPED_TAGS] (state, payload) {
        state.mappedTags = payload
    },

    [types.OFFER_TYPES_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
