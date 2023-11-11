<template>
    <div class="flex justify-content-center surface-0 pt-4 border-1 border-round-xl border-300 shadow-3">
        <div class="flex flex-column gap-2 form-width company-logo">

            <div class="flex justify-content-end w-full px-3">
                <div class="flex-1 flex align-items-center justify-content-start h-5rem"></div>

                <Prime-Switch-Button
                    v-model="lang"
                    @change="changeLanguage"
                    :options="[
                        { label: 'English', value:'en' },
                        { label: 'Malay', value:'my' }
                    ]"
                    optionLabel="label"
                    optionValue="value">
                </Prime-Switch-Button>
            </div>

            <h2 v-html="language.title" class="m-0 border-bottom-1 border-200 py-3 px-4 text-900"></h2>

            <div class="w-full px-2">
                <p v-html="language.instruction" class="m-0 p-0 text-700 line-height-3 surface-ground border-round p-3"></p>
            </div>

            <!-- Staff ID -->
            <div class="flex-auto border-top-1 border-200 mt-2 pt-3 px-4">
                <div ref="staffcode" class="w-full flex align-items-center flex-wrap gap-3 mb-2">
                    <label v-html="language.staff_label" for="staffid" class="font-bold block text-800 flex-1"></label>
                    <span v-if="v$.collectStaffcode.$error" class="text-red-600 white-space-nowrap font-italic text-sm">{{ language.staff_label_require_text }}</span>
                </div>

                <Prime-InputMask
                    v-model="collectStaffcode"
                    id="staffid"
                    class="w-full border-400 border-round p-3"
                    mask="a 9 9 9 9 9 9 9"
                    :placeholder="language.staff_label">
                </Prime-InputMask>
            </div>

            <!-- Session -->
            <div class="flex-auto border-top-1 border-200 mt-2 pt-3 px-4">
                <div ref="session" class="w-full flex align-items-center flex-wrap gap-3 mb-2">
                    <label v-html="language.session_label" for="session" class="font-bold block text-800 flex-1"></label>
                    <span v-if="v$.collectSession.$error" class="text-red-600 white-space-nowrap font-italic text-sm">{{ language.session_label_require_text }}</span>
                </div>

                <Prime-Dropdown
                    v-model="collectSession"
                    id="session"
                    :options="language.session_options"
                    :placeholder="language.session_label"
                    class="w-full session-dropdown"
                    optionLabel="name"
                    optionValue="value"
                    @change="onChangeSession">

                    <template #value="{ value , placeholder }">
                        <template v-if="value">
                            <div class="flex gap-3 align-items-center">
                                <Day-Icon :daylight="value"></Day-Icon>
                                <span class="flex-1">{{ sessionLabel(value) }}</span>
                            </div>
                        </template>

                        <template v-else>{{ placeholder }}</template>
                    </template>

                    <template #option="{ option }">
                        <div class="flex gap-3 align-items-center">
                            <day-icon :daylight="option.value"></day-icon>
                            <span class="flex-1">{{ option.name }}</span>
                        </div>
                    </template>
                </Prime-Dropdown>
            </div>

            <!-- Rate Input -->
            <template v-for="(mark, index) in collectRate" :key="index">
                <div :class="['flex-auto border-200 mt-2 pt-3 px-4', { 'border-top-1' : true }]">
                    <label v-html="language[`rating_label_${ index }`]" class="text-800 font-bold block"></label>

                    <span v-html="language[`rating_description_${ index }`]" class="text-600 text-sm block py-1"></span>
                    
                    <Prime-Rating
                        v-model="collectRate[index].value"
                        class="mt-2 mb-1"
                        :cancel="false"
                        :pt="{
                            officon: { class: 'text-yellow-400 text-3xl' },
                            onIcon: { class: 'text-yellow-400' }
                        }">
                    </Prime-Rating>
                </div>
            </template>

            <!-- Comment -->
            <div class="flex-auto border-top-1 border-200 mt-2 pt-3 px-4">
                <label v-html="language.comment_label" for="comment" class="font-bold block mb-2 text-800"></label>

                <Prime-Textarea
                    id="comment"
                    v-model="collectComment"
                    :placeholder="language.comment_placeholder"
                    :class="['w-full border-400 border-round p-3', {
                        'p-invalid': true
                    }]"
                    rows="4"
                    aria-describedby="text-error">
                </Prime-Textarea>
            </div>

            <!-- Picture -->
            <div class="flex-auto px-4">
                <label v-html="language.attachment_label" class="font-italic block mb-2 text-800"></label>

                <Prime-File-Upload
                    ref="uploader"
                    mode="basic"
                    url="#"             
                    :chooseLabel="language.attachment_placeholder"
                    :multiple="false"
                    :showUploadButton="false"
                    :showCancelButton="true"
                    :accept="'image/png, image/jpeg'"
                    :maxFileSize="1000000"
                    @select="onAddAttachment">
                </Prime-File-Upload>

                <div v-if="showpicture" class="flex w-full border-1 border-300 p-1 border-round mt-3 shadow-1 relative">
                    <img :src="showpicture" class="w-full h-full border-1 border-300 border-round">

                    <Prime-Button
                        @click="onClearAttachment"
                        :label="language.attachment_remove_text"
                        class="w-full absolute bottom-0 border-top-3 border-0 border-noround-top surface-0 text-red-500 underline hover:bg-red-50">
                    </Prime-Button>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="block px-4 border-top-1 border-300 mt-2">
                <Prime-Button
                    @click="onSubmit"
                    :loading="loading"
                    :label="language.submit_button"
                    severity="success"
                    class="mt-3 w-full">
                </Prime-Button>
            </div>

            <!-- Admin Login Button -->
            <div class="mt-2 flex align-items-center justify-content-center w-full surface-900 border-round-bottom-xl text-0 py-1 text-center flex-wrap gap-1" :style="{ fontSize: '10px' }">
                <span>All rights reserved. Served with ❤️ by Sensata Technologies</span>
                <span>|</span>
                <a @click="onAdminlogin" href="JavaScript:void(0)" class="text-0 no-underline">admin login</a>
            </div>

        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { useVuelidate } from '@vuelidate/core';
import { required } from '@vuelidate/validators';
import malay from '../lang/malay.json';
import english from '../lang/english.json';

export default {
    name: 'RatingForm',
    data: function(){
        return {
            lang: 'my',
            language: malay,
            loading: false,

            collectComment: null,
            collectSession: null,
            collectStaffcode: null,
            collectAttachment: null,
            collectRate: [{
                label: "Food and Cafe Cleanliness/Tahap Kebersihan Makanan Dan Kafeteria",
                description: "Are the Food and Cafe Cleanliness Satisfying?/Adakah Tahap Kebersihan Makanan dan Kafeteria Memuaskan?",
                value: null
            },{
                label: "Food Menu/Menu Makanan",
                description: "How diverse and varied are the food options available?/Adakah Menu makanan mempunyai kepelbagaian?",
                value: null
            },{
                label: "Food Presentation/Cara Penyusunan Dan Cara Makanan Dipamerkan",
                description: "How appealing is the visual presentation of the dishes?/Adakah cara makanan dipamerkan menyelerakan dan menarik?",
                value: null
            },{
                label: "Food Quality and Taste/Kualiti dan Rasa Makanan",
                description: "How fresh are the ingredients used in the dishes?Please rate the taste./Adakah bahan makanan yg digunakan segar? Sila nilai rasa makanan.",
                value: null
            
            },{
                label: "Customer Service/Khidmat Pelanggan",
                description: "Does the Customer Service here provide good service?/Adakah Perkhidmatan Pelanggan di sini memberikan layanan yang baik?",
                value: null
            }]
        }
    },
    computed: {
        showpicture: function(){
            if(Array.isArray(this.collectAttachment)){
                const imageobject = (this.collectAttachment[0] ?? {});

                return (imageobject.objectURL ?? null);
            }

            return null;
        }
    },
    methods: {
        changeLanguage: function(){
            switch(this.lang){
                case 'my':
                    this.language = malay;
                break;
                case 'en':
                    this.language = english;
                break;
            }
        },
        reset: function(){
            this.collectComment = null;

            this.collectSession = null;

            this.collectStaffcode = null;

            this.onClearAttachment();

            this.collectRate.forEach(c => {
                c.value = null;
            });
        },
        sessionLabel: function(id){
            const data = this.language.session_options.find(c => c.value == id);

            if(data){
                return data.name;
            }

            return 'nothing';
        },
        onAdminlogin: function(){
            window.location.hash = '#admin';
        },
        onClearAttachment: function(){
            const { uploader } = this.$refs;

            uploader.clear();
            this.collectAttachment = null;
        },
        onAddAttachment: function({ files }){
            this.collectAttachment = files;
        },
        onSubmit: async function(){
            const lang = (this.language);

            try{
                const isvalid = await this.v$.$validate();

                if(isvalid){
                    //# Proceed --
                    this.loading = true;

                    const $confirm = await this.$swal({
                        title: lang.confirm_submit_title,
                        text: lang.confirm_submit_description,
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonText: lang.confirm_submit_agree_text,
                        cancelButtonText: lang.confirm_submit_decline_text,
                        confirmButtonClass: 'bg-success-600',
                        cancelButtonClass: 'surface-600'
                    });

                    if($confirm.isConfirmed){
                        const formdata = new FormData();
                        const uploadAPI = `${ this.$api }/api/rating/create`;

                        formdata.append('mark', this.collectRate.map(c => c.value ?? 1));
                        formdata.append('review', this.collectComment ?? '');
                        formdata.append('cafe_id', this.collectSession);
                        formdata.append('employee_id', this.collectStaffcode.replace(/\s+/g, ''));

                        if(Array.isArray(this.collectAttachment)){
                            formdata.append('images', this.collectAttachment.pop());
                        }

                        const { status } = await axios.post(uploadAPI, formdata, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        });

                        const swalmessage = {
                            title: lang.done_submit_title,
                            text: lang.done_submit_description,
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonText: lang.done_submit_agree_text,
                            confirmButtonClass: 'bg-success-600',
                        };

                        if(status == 208){
                            swalmessage.icon = 'warning';
                            swalmessage.title = lang.duplicated_submit_title;
                            swalmessage.text = lang.duplicated_submit_description;
                            swalmessage.confirmButtonText = lang.duplicated_submit_agree_text;
                        }

                        if(status == 400){
                            swalmessage.icon = 'error';
                            swalmessage.title = lang.fail_submit_title;
                            swalmessage.text = lang.fail_submit_description;
                            swalmessage.confirmButtonText = lang.fail_submit_agree_text;
                        }

                        this.$swal(swalmessage);
                        this.reset();
                    }

                    this.loading = false;
                }else{
                    //# Denied --
                    const emptyCode = (this.v$.collectStaffcode.$error);
                    const emptySession = (this.v$.collectSession.$error);
                    const configScroller = { behavior: "smooth", block: "end", inline: "nearest" };
                    const { staffcode, session } = this.$refs;

                    if(emptyCode){
                        staffcode.scrollIntoView(configScroller);
                        
                    }else if(emptySession){
                        session.scrollIntoView(configScroller);
                    }
                }

            }catch(error){
                //# Failure --
                this.$swal({
                    title: lang.fail_submit_title,
                    text: lang.fail_submit_description,
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonText: lang.fail_submit_agree_text,
                    confirmButtonClass: 'bg-red-600',
                });

                this.loading = false;
            }
        },
        onChangeSession: function(){
            this.collectComment = null;
            this.collectRate.forEach(c => {
                c.value = null;
            });
        }
    },
    setup: function(){
        return { v$: useVuelidate() }
    },
    validations () {
        return {
            collectSession: { required },
            collectStaffcode: { required },
            collectRate: [
                { value: required },
                { value: required },
                { value: required },
                { value: required },
                { value: required }
            ]
        }
    },
    mounted: function(){

    }
}
</script>