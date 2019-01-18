import * as types from "../../mutation-types"
import { mapTags } from "@/utilities/helpers"

export default {
    fetchAllOfferTypes ({ commit, dispatch }) {
        return window.axios.get("/api/offer-types")
            .then(response => {
                const all = response.data.data
                commit(types.OFFER_TYPES_FETCH_ALL, all)
                dispatch("mapOfferTypeTags", all)
                return all
            })
            .catch(error => {
                commit(types.OFFER_TYPES_ERROR, error)
                return error
            })
    },

    fetchOneOfferType ({ commit }, id) {
        return window.axios.get("/api/offer-types/" + id)
            .then(response => {
                const one = response.data
                commit(types.OFFER_TYPES_FETCH_ONE, one)
                return one
            })
            .catch(error => {
                commit(types.OFFER_TYPES_ERROR, error)
                return error
            })
    },

    mapOfferTypeTags ({ commit, state }, all) {
        const tags = mapTags(all || state.all)
        commit(types.OFFER_TYPES_MAPPED_TAGS, tags)
        return tags
    },

    reset ({ commit }) {
        commit(types.OFFER_TYPES_RESET)
        return null
    }
}
