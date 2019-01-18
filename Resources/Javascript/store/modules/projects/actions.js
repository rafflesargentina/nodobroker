import { mapTags } from "@/utilities/helpers"
import { filter, uniqBy } from "lodash"
import * as types from "../../mutation-types"

export default {
    fetchAllProjects ({ commit, dispatch }) {
        return window.axios.get("/api/projects")
            .then(response => {
                const all = response.data.data
                commit(types.PROJECTS_FETCH_ALL, all)
                dispatch("mapProjectsFeatured", all)
                dispatch("mapProjectsNonFeatured", all)
                dispatch("mapProjectCityTags", all)
                return all
            })
            .catch(error => {
                console.log(error)
                commit(types.PROJECTS_ERROR, error)
                return error
            })
    },

    fetchOneProject ({ commit }, id) {
        return window.axios.get("/api/projects/" + id)
            .then(response => {
                const one = response.data
                commit(types.PROJECTS_FETCH_ONE, one)
                return one
            })
            .catch(error => {
                commit(types.PROJECTS_ERROR, error)
                return error
            })
    },

    mapProjectCityTags({ commit }, all) {
        const tags = uniqBy(mapTags(filter(all, (item)=> null !== item.city), "city", "city"), "id")
        commit(types.PROJECTS_MAPPED_CITY_TAGS, tags)
        return tags
    },

    mapProjectsFeatured({ commit, state }, all) {
        const featured = filter(all || state.all, (item)=> item.featured === "1")
        commit(types.PROJECTS_FEATURED, featured)
        return featured
    },

    mapProjectsNonFeatured({ commit, state }, all) {
        const nonFeatured = filter(all || state.all, (item)=> item.featured !== "1")
        commit(types.PROJECTS_NON_FEATURED, nonFeatured)
        return nonFeatured
    },

    reset ({ commit }) {
        commit(types.PROJECTS_RESET)
        return null
    }
}
