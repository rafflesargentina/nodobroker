import actions from "./actions"
import getters from "./getters"
import mutations from "./mutations"

export function initialState()
{
    return {
        all: [],
        featured: [],
        unfeatured: [],
        mappedCityTags: [],
        one: {
            base_price: "",
            city: "",
            country: "",
            description: "",
            entertainment: "",
            featured: "",
            gas: "",
            investment: "",
            light: "",
            name: "",
            place: "",
            project_type_id: "",
            resume: "",
            slug: "",
            state: "",
            total_area: "",
            user_id: "",
            water: "",
        },
    }
}

const state = {
    initialState: initialState(),
    ...initialState()
}

export default {
    actions,
    getters,
    mutations,
    state
}
