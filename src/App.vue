<template>
    <div class="card flex justify-content-center">
        <form class="flex flex-column gap-2 form-width">

            <h2 class="m-0 border-bottom-1 border-200 py-3 px-4 text-900">Live STM Cafeteria Rating System/Sistem Penilaian Secara Langsung Kafeteria STM</h2>

            <div class="w-full px-2">
                <p class="m-0 p-0 text-700 line-height-3 surface-ground border-round p-3">
                    Welcome to the Live Rating Cafeteria System/Selamat Datang ke Sistem Penilaian Secara Langsung Kafeteria<br><br>
                    Your feedback is invaluable to us as we strive to enhance our cafeteria. Kindly take a moment to rate your experience STM Cafeteria./Pendapat anda amatlah penting bagi penambahbaikan kafeteria STM, sila kongsi pendapat anda.<br><br>
                    Please rate based on your opinion/Sila nilai berdasarkan pendapat anda, ★★★★★-Highest Rate/Terbaik  ★-Lowest Rate/Markah Terendah.<br><br>

                    Thank you/ Terima Kasih
                </p>
            </div>

            <!-- Rate Input -->
            <template v-for="(mark, index) in collectRate" :key="index">
                <div :class="['flex-auto border-200 mt-2 pt-3 px-4', { 'border-top-1' : true }]">
                    <label for="comment" class="text-800 font-bold block">{{ mark.label }}</label>

                    <span class="text-600 text-sm block py-1">{{ mark.description }}</span>
                    
                    <Prime-Rating
                        v-model="collectRate[index].value"
                        class="mt-2 mb-1"
                        :pt="{
                            officon: { class: 'text-yellow-400 text-3xl' },
                            onIcon: { class: 'text-yellow-400' }
                        }">
                    </Prime-Rating>
                </div>
            </template>

            <!-- Comment -->
            <div class="flex-auto border-top-1 border-200 mt-2 pt-3 px-4">
                <label for="comment" class="font-bold block mb-2 text-800">Please share your thoughts(If Any)/Sila Kongsi Pendapat Anda(Jika Ada)</label>

                <Prime-Textarea
                    id="comment"
                    v-model="collectComment"
                    placeholder="Please provide your comments/Sila nyatakan komen anda"
                    :class="['w-full border-400 border-round p-3', {
                        'p-invalid': true
                    }]"
                    rows="4"
                    aria-describedby="text-error">
                </Prime-Textarea>
            </div>

            <!-- Submint Button -->
            <div class="block px-4">
                <Prime-Button label="Submit Review/Pengesahan Review" class="mt-3 w-full"></Prime-Button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: 'App',
    data: function(){
        return {
            collectComment: null,
            collectRate: [{
                label: "Food and Cafe Cleanliness/Tahap Kebersihan Makanan Dan Kafeteria",
                description: "Are the Food and Cafe Cleanliness Satisfying?/Adakah Tahap Kebersihan Makanan dan Kafeteria Memuaskan?",
                value: 0
            },{
                label: "Food Menu/Menu Makanan",
                description: "How diverse and varied are the food options available?/Adakah Menu makanan mempunyai kepelbagaian?",
                value: 0
            },{
                label: "Food Presentation/Cara Penyusunan Dan Cara Makanan Dipamerkan",
                description: "How appealing is the visual presentation of the dishes?/Adakah cara makanan dipamerkan menyelerakan dan menarik?",
                value: 0
            },{
                label: "Food Quality and Taste/Kualiti dan Rasa Makanan",
                description: "How fresh are the ingredients used in the dishes?Please rate the taste./Adakah bahan makanan yg digunakan segar? Sila nilai rasa makanan.",
                value: 0
            
            },{
                label: "Customer Service/Khidmat Pelanggan",
                description: "Does the Customer Service here provide good service?/Adakah Perkhidmatan Pelanggan di sini memberikan layanan yang baik?",
                value: 0
            }]
        }
    }
}
</script>

<style lang="scss">
@import "primevue/resources/themes/lara-light-indigo/theme.css";
@import "primeflex/primeflex.css";

body, textarea {
    font-family: var(--font-family);
}

.form-width{
    max-width: clamp(380px, 50vw, 560px);
}
</style>
