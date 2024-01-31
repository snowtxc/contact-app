<script setup>
        import { useAuthStore} from "@/stores/authStore";
        import { Form } from 'vee-validate';
        import { LoginFormSchema } from "@/helpers/schemas/LoginFormSchema"


        const $router = useRouter();
        const alert = useAlert();

    
        const authStore = useAuthStore();

        const onSubmit = (values)=>{
            const { email ,password } = values;
            authStore.login(email, password).then(()=>{
                $router.push("/contacts");
            }).catch(error =>{
                alert.showError(error)
            });
        }

        function onInvalidSubmit() {
            alert.showError("Invalid data");       
        }

</script> 

<template>

<HeaderComponent></HeaderComponent>
  <Form @submit="onSubmit" :validation-schema="LoginFormSchema" @invalid-submit="onInvalidSubmit">
    <div class="w-full flex justify-center items-center flex-col mt-32">
    <div class="px-5 w-full sm:w-1/2 md:w-1/3   flex justify-center flex-col">
      <h1 class="text-4xl font-black text-center py-16">Welcome</h1>
      <div>
        <span>Email</span>
        <BaseInput  name="email" type="text" placeholder="Email"></BaseInput>
    
      </div>
      <div class="mt-5">
        <span>Password</span>
        <BaseInput name="password" type="password" placeholder="Password"></BaseInput>       
      </div>
      <div class="flex justify-center">
        <BaseButtonComponent text="Login" class="mt-10 flex-none" classes="w-64" ></BaseButtonComponent>
      </div>
    </div>
  </div>
  </Form>
  
</template>
