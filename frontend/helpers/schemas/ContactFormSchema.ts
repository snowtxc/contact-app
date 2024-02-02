

import * as yup from 'yup';

export const ContactFormSchema = yup.object({
    name: yup.string().required(),
    address:  yup.string().required(),
    phone: yup.string().required(),
    email: yup.string().required().email(),
    title: yup.string().required() ,
});