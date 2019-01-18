import { mapActions, mapState } from "vuex"

export const offerTypesComputed = {
    ...mapState(
        "offerTypes", {
            allOfferTypes: state => state.all,
            offerTypesMappedTags: state => state.mappedTags,
            oneOfferType: state => state.one
        }
    ),
}

export const offerTypesMethods = {
    ...mapActions(
        "offerTypes", [
            "fetchAllOfferTypes",
            "fetchOneOfferType"
        ]
    )
}

export const projectsComputed = {
    ...mapState(
        "projects", {
            allProjects: state => state.all,
            projectsFeatured: state => state.featured,
            projectsNonFeatured: state => state.nonFeatured,
            projectsMappedCityTags: state => state.mappedCityTags,
            oneProject: state => state.one
        }
    ),
}

export const projectsMethods = {
    ...mapActions(
        "projects", [
            "fetchAllProjects",
            "fetchOneProject"
        ]
    )
}

export const projectTypesComputed = {
    ...mapState(
        "projectTypes", {
            allProjectTypes: state => state.all,
            projectTypesMappedTags: state => state.mappedTags,
            oneProjectType: state => state.one
        }
    ),
}

export const projectTypesMethods = {
    ...mapActions(
        "projectTypes", [
            "fetchAllProjectTypes",
            "fetchOneProjectType"
        ]
    )
}
