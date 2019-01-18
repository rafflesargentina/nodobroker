import * as types from "../../mutation-types"
import { mapTags } from "@/utilities/helpers"

export default {
    fetchAllProjectTypes ({ commit, dispatch }) {
        return window.axios.get("/api/project-types")
            .then(response => {
                const all = response.data.data
                commit(types.PROJECT_TYPES_FETCH_ALL, all)
                dispatch("mapProjectTypeTags", all)
                return all
            })
            .catch(error => {
                commit(types.PROJECT_TYPES_ERROR, error)
                return error
            })
    },

    fetchOneProjectType ({ commit }, id) {
        return window.axios.get("/api/project-types/" + id)
            .then(response => {
                const one = response.data
                commit(types.PROJECT_TYPES_FETCH_ONE, one)
                return one
            })
            .catch(error => {
                commit(types.PROJECT_TYPES_ERROR, error)
                return error
            })
    },

    mapProjectTypeTags ({ commit, state }, all) {
        const tags = mapTags(all || state.all)
        commit(types.PROJECT_TYPES_MAPPED_TAGS, tags)
        return tags
    },

    reset ({ commit }) {
        commit(types.PROJECT_TYPES_RESET)
        return null
    }
}
