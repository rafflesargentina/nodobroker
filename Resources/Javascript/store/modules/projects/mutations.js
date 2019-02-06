import * as types from "../../mutation-types"
import { initialState } from "./projects"

export default {
    [types.PROJECTS_ERROR] (state, payload) {
        state.error = JSON.stringify(payload)
    },

    [types.PROJECTS_FEATURED] (state, payload) {
        state.featured = payload
    },

    [types.PROJECTS_FETCH_ALL] (state, payload) {
        state.all = payload
    },

    [types.PROJECTS_FETCH_ONE] (state, payload) {
        state.one = payload
    },

    [types.PROJECTS_UNFEATURED] (state, payload) {
        state.unfeatured = payload
    },

    [types.PROJECTS_MAPPED_CITY_TAGS] (state, payload) {
        state.mappedCityTags = payload
    },

    [types.PROJECTS_RESET] (state) {
        Object.assign(state, { initialState: initialState(), ...initialState() })
    }
}
