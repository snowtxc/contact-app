import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

export const useAlert = () => {
    const $toast = useToast();
    
    const showError = (errorMessage:string)=>{
        $toast.error(errorMessage);
    }

    const showSucess = (message:string)=>{
        $toast.success(message);
    }

    return {
        showError,
        showSucess
    }
}