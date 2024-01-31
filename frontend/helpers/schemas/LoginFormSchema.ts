

import * as yup from 'yup';

export const LoginFormSchema = yup.object({
    email: yup.string().required(),
    password: yup.string().required()
});