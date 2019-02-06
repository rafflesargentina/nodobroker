import { mapActions, mapState } from "vuex"

export const brokersComputed = {
    ...mapState(
        "brokers", {
            allBrokers: state => state.all,
            oneBroker: state => state.one,
            oneProjectMappedTags: state => state.oneProjectMappedTags,
        }
    ),
}

export const brokersMethods = {
    ...mapActions(
        "brokers", [
            "deleteOneBroker",
            "fetchAllBrokers",
            "fetchOneBroker",
            "mapOneProjectTags",
        ]
    )
}

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
            projectsNonFeatured: state => state.unfeatured,
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
