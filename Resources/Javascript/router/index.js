
import router from "@/router"

router.addRoutes(
    [
        {
            name: "About",
            path: "/about",
            component: require("./views/About.vue")
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
        //{
        //name: "ProjectsIndex",
        //path: "/projects",
        //component: require("./views/Projects/Index.vue")
        //},
        {
            name: "ProjectsShow",
            path: "/projects/:id",
            component: require("./views/Projects/Show.vue")
        }
    ]
)
