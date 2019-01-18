import * as types from "../../mutation-types"
import { initialState } from "./projectTypes"

export default {
    [types.PROJECT_TYPES_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.PROJECT_TYPES_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.PROJECT_TYPES_FETCH_ONE] (state, payload) {
        state.one = payload
    },

    [types.PROJECT_TYPES_MAPPED_TAGS] (state, payload) {
        state.mappedTags = payload
    },

    [types.PROJECT_TYPES_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
