import { useAuthStore} from "@/stores/authStore";

export default defineNuxtRouteMiddleware((to, from,next)=>{
    const publicPages = ['/login'];
    const authRequired = !publicPages.includes(to.path);
    const auth = useAuthStore();
    if (authRequired && !auth.user) {
        return navigateTo("/login");
    }
    return;
})