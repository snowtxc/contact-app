import { defineStore } from 'pinia';
import { fetchWrapper } from "@/helpers/fetch-wrapper";

const baseUrl = `${import.meta.env.VITE_API_URL}/auth`;

export const useAuthStore = defineStore('auth', {
    state: ()=> ({ user: null}),
    actions: {
        async login(email,password){
            const user  = await fetchWrapper.post(`${baseUrl}/login`, { email, password });
            this.user = user;
            return;
        },

        logout() {
            this.user = null;
            navigateTo("/login");
        }
    },
    persist: true
});