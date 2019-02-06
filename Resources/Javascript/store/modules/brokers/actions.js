import * as types from "../../mutation-types"
import { mapTags } from "@/utilities/helpers"

export default {
    deleteOneBroker ({ commit }, id) {
        return window.axios.delete("/api/brokers/" + id)
            .then(response => {
                const r = response.data.data
                commit(types.BROKERS_DELETE_ONE, r)
                return r
            })
            .catch(error => {
                console.error(error)
                commit(types.BROKERS_ERROR, error)
                return error
            })
    },

    fetchAllBrokers ({ commit }) {
        return window.axios.get("/api/brokers")
            .then(response => {
                const all = response.data.data
                commit(types.BROKERS_FETCH_ALL, all)
                return all
            })
            .catch(error => {
                console.error(error)
                commit(types.BROKERS_ERROR, error)
                return error
            })
    },

    fetchOneBroker ({ commit, dispatch }, id) {
        return window.axios.get("/api/brokers/" + id)
            .then(response => {
                const one = response.data
                commit(types.BROKERS_FETCH_ONE, one)
                dispatch("mapOneProjectTags", one)
                return one
            })
            .catch(error => {
                console.error(error)
                commit(types.BROKERS_ERROR, error)
                return error
            })
    },

    mapOneProjectTags ({ commit }, one) {
        const oneProjectTags = mapTags(one.projects)
        commit(types.BROKERS_ONE_PROJECT_MAP_TAGS, oneProjectTags)
        return oneProjectTags
    },

    reset ({ commit }) {
        commit(types.BROKERS_RESET)
        return null
    }
}
