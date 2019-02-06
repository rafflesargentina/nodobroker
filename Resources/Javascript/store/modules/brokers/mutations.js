import * as types from "../../mutation-types"
import { initialState } from "./brokers"

export default {
    [types.BROKERS_DELETE_ONE] () {},

    [types.BROKERS_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.BROKERS_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.BROKERS_FETCH_ONE] (state, payload) {
        state.one = Object.freeze(payload)
    },

    [types.BROKERS_ONE_PROJECT_MAP_TAGS] (state, payload) {
        state.oneProjectMappedTags = payload
    },

    [types.BROKERS_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
