import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

export const useAlert = () => {
    const $toast = useToast();
    
    const showError = (errorMessage:string)=>{
        $toast.error(errorMessage);
    }
    return {
        showError
    }
}