import { defineStore } from 'pinia';
import { fetchWrapper } from "@/helpers/fetch-wrapper";
const baseUrl = `${import.meta.env.VITE_API_URL}/contacts`;

export const useContactStore = defineStore('contact', {
    state: ()=> ({ }),
    actions: {
        async fetchAll(){
            const data = await fetchWrapper.get(`${baseUrl}`);
            return data;
        },

        async fetchById(id){
            const contact  =  await fetchWrapper.get(`${baseUrl}/${id}`);
            return contact;
        },

        async create(data,avatarFile){
            const formData = new FormData();
            const { name , address, phone, email, title} = data;
            formData.append('name', name);
            formData.append('address',address);
            formData.append('phone', phone);
            formData.append('email', email);
            formData.append('title', title);
            if(avatarFile){
                formData.append('avatar',avatarFile);
            }
            const newContact = await fetchWrapper.post(`${baseUrl}/`,formData);
            return newContact;
        },

        async update(id, data, avatarFile){
            const formData = new FormData();
            const { name , address, phone, email, title} = data;
            formData.append('name', name);
            formData.append('address',address);
            formData.append('phone', phone);
            formData.append('email', email);
            formData.append('title', title);
            if(avatarFile){
                formData.append('avatar',avatarFile);
            }
            const contactUpdated = await fetchWrapper.post(`${baseUrl}/${id}/edit`,formData);     
            return contactUpdated;
        }
    }
});