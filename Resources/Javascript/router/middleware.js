import store from "@/store"

export const canAccessAdmin = (to, from, next) => {
    var user = store.state.auth.user
    if (user) {
        if (store.getters["auth/isAdmin"] === true) {
            return next()
        }
    }

    return next({ name: "Unauthorized"})
}

export const canSeeProject = (to, from, next) => {
    var user = store.state.auth.user
    if (user) {
        if (user.projects.map(item => item["id"]).includes(to.params.id)) {
            return next()
        }

        if (store.getters["auth/isAdmin"] === true) {
            return next()
        }
    }

    return next({ name: "Unauthorized"})
}
