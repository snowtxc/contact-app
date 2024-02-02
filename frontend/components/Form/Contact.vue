
<script setup>

  import { Action } from "@/helpers/enums/ActionEnum";
  import { ContactFormSchema } from "@/helpers/schemas/ContactFormSchema";
  import { useContactStore } from "#imports";
  import { Form } from "vee-validate";

  const contactStore = useContactStore();
  const avatarRef = ref(null);
  const avatarFile = ref(null);
  const props =  defineProps({
    action: {type: String ,required: true},
    defaultValues : {type:Object, required: false}
  })
  const alert = useAlert();
  const utils = useUtils();
  const textName= ref("");
  const textTitle = ref("");
 
  if(props.defaultValues){
    const { profilePicture ,name, title} = props.defaultValues; 
    avatarRef.value = profilePicture;
    textName.value = name;
    textTitle.value = title;
  }
  const onSubmit = async(values,{resetForm})=>{
    if(props.action == Action.CREATE){
      const newContact =  await contactStore.create(values, avatarFile.value);
      alert.showSucess("Contact created successfully!");
      reset(resetForm);

    }else{
      const { id } = props.defaultValues;
      const contactUpdate = await contactStore.update(id, values, avatarFile.value);
      textName.value = contactUpdate.name;
      textTitle.value = contactUpdate.title;
      alert.showSucess("Contact updated successfuly!");
      
    }
  }

  const reset = (resetForm)=>{
    resetForm();
    avatarFile.value =null;
    avatarRef.value = false;
  }

  const onInvalidSubmit = ()=>{
    alert.showError("Invalid data");       
  }

  const changeAvatar = async (file)=>{
     avatarRef.value = await utils.fileToB64(file);
     avatarFile.value = file;
  }

  const onCancel = ($e)=>{
    navigateTo("/");
  }



</script>

<template>
  <HeaderComponent class="flex justify-start items-center">
    <BaseBackButton></BaseBackButton>
    <div class="w-full flex justify-end">
          <BaseLogoutButton></BaseLogoutButton>

        </div>

  </HeaderComponent>
  <BannerComponent class="hidden md:block"></BannerComponent>
  <UserAvatar  classes="w-28 h-28 md:w-44 md:h-44  mx-auto relative -mt-56 md:-mt-40"
      imgClasses="md:h-44 md:w-44" :urlImg="avatarRef"></UserAvatar>

  <div class="text-center hidden md:block flex flex-col justify-center items-center mt-5" v-if="action == Action.EDIT && props.defaultValues">    
      <h2 class="font-semibold text-2xl">{{  textName }}</h2>
      <p class="text-gray-500">{{ textTitle }}</p>
  </div>
  <Form  @submit="onSubmit" :validation-schema="ContactFormSchema" @invalid-submit="onInvalidSubmit" :initial-values="props.defaultValues ? props.defaultValues : null">
    <div class="w-full mt-10 w-full md:w-1/2 mx-auto">
    <div class="mt-32 md:mt-0 flex flex-col md:flex-row gap-10 w-full px-5 md:px-0">
      <div class="flex flex-col gap-10 flex-1">
        <div>
          <h2 class="font-semibold text-xl">Name</h2>
          <BaseInput name="name" type="text" placeholder="Name" :value="props.defaultValues ? props.defaultValues.name : null" ></BaseInput>
        </div>
        <div>
          <h2 class="font-semibold text-xl">Title</h2>
          <BaseInput name="title" type="text" placeholder="Title" :value="props.defaultValues ? props.defaultValues.title : null"></BaseInput>
        </div>
        <div>
          <h2 class="font-semibold text-xl">Profile Picture</h2>
          <BaseInputFile name="profilePicture" @onChangeImg="changeAvatar"></BaseInputFile>
        </div>
      </div>
      <div class="flex flex-col gap-10 flex-1">
        <div>
          <h2 class="font-semibold text-xl">Address</h2>
          <BaseInputAddress name="address" placeholder="Address" :value="props.defaultValues ? props.defaultValues.address: null"></BaseInputAddress>
        </div>
        <div>
          <h2 class="font-semibold text-xl">Phone</h2>
          <BaseInput name="phone" type="text" placeholder="Phone" :value="props.defaultValues ? props.defaultValues.phone : null"></BaseInput>
        </div>
        <div>
          <h2 class="font-semibold text-xl">Email</h2>
          <BaseInput name="email" type="text" placeholder="Email" :value="props.defaultValues ? props.defaultValues.email : null"></BaseInput>
        </div>
        <div>
        </div>
      </div>
    </div>
    <div class="mt-5 flex justify-center md:gap-5 gap-2 px-5">
        <BaseButtonComponent type="button" text="CANCEL" classes="w-full" @click="onCancel"></BaseButtonComponent>
        <BaseButtonComponent text="SAVE" classes="w-full" type="submit"></BaseButtonComponent>
     </div>
  </div>
  </Form>
  
    
</template>
