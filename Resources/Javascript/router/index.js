import * as middleware from "./middleware"
import { authRequired, authNotRequired } from "@/router/middleware"
import multiguard from "vue-router-multiguard"
import router from "@/router"

router.addRoutes(
    [
        {
            name: "About",
            path: "/about",
            component: require("./views/About.vue")
        },
        {
            children: [
                {
                    beforeEnter: multiguard([authRequired, middleware.canAccessAdmin]),
                    name: "Admin",
                    path: "/admin",
                    component: require("./views/Admin/Projects/Index.vue")
                },
                {
                    beforeEnter: multiguard([authRequired, middleware.canAccessAdmin]),
                    name: "AdminProjectsIndex",
                    path: "/admin/projects",
                    component: require("./views/Admin/Projects/Index.vue")
                },
                {
                    beforeEnter: multiguard([authRequired, middleware.canAccessAdmin]),
                    name: "AdminProjectsCreate",
                    path: "/admin/projects/create",
                    component: require("./views/Admin/Projects/Create.vue")
                },
                {
                    beforeEnter: multiguard([authRequired, middleware.canAccessAdmin]),
                    name: "AdminProjectsEdit",
                    path: "/admin/projects/:id/edit",
                    component: require("./views/Admin/Projects/Edit.vue")
                },
                {
                    beforeEnter: multiguard([authRequired, middleware.canAccessAdmin]),
                    name: "AdminBrokersIndex",
                    path: "/admin/brokers",
                    component: require("./views/Admin/Brokers/Index.vue")
                },
                {
                    beforeEnter: multiguard([authRequired, middleware.canAccessAdmin]),
                    name: "AdminBrokersCreate",
                    path: "/admin/brokers/create",
                    component: require("./views/Admin/Brokers/Create.vue")
                },
                {
                    beforeEnter: multiguard([authRequired, middleware.canAccessAdmin]),
                    name: "AdminBrokersEdit",
                    path: "/admin/brokers/:id/edit",
                    component: require("./views/Admin/Brokers/Edit.vue")
                },
            ],
            component: require("./views/Admin/Admin.vue"),
            path: "/admin"
        },
        {
            name: "Brokers",
            path: "/brokers",
            component: require("./views/Brokers.vue")
        },
        {
            name: "Contact",
            path: "/contact",
            component: require("./views/Contact.vue")
        },
        {
            name: "Developers",
            path: "/developers",
            component: require("./views/Developers.vue")
        },
        {
            name: "Home",
            path: "/",
            component: require("./views/Home.vue")
        },
        {
            beforeEnter: authNotRequired,
            component: require("./views/auth/Login.vue"),
            meta: {
                footer: false
            },
            name: "Login",
            path: "/login"
        },
        //{
        //name: "ProjectsIndex",
        //path: "/projects",
        //component: require("./views/Projects/Index.vue")
        //},
        {
            beforeEnter: multiguard([authRequired, middleware.canSeeProject]),
            name: "ProjectsShow",
            path: "/projects/:id",
            component: require("./views/Projects/Show.vue")
        },
        {
            beforeEnter: authNotRequired,
            component: require("./views/auth/Register.vue"),
            meta: {
                footer: false
            },
            name: "Register",
            path: "/register"
        },
    ]
)

router.scrollBehavior = (to, from, savedPosition)=> {
    return { x: 0, y: 0 }
}
