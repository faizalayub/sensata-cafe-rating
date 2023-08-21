<template>
    <div class="card flex justify-content-center">
        <form class="flex flex-column gap-2 form-width">

            <h2 class="m-0 border-bottom-1 border-200 py-3 px-4 text-900">Kitchen Experience and Food Quality Rating Form</h2>

            <div class="w-full px-2">
                <p class="m-0 p-0 text-700 line-height-3 surface-ground border-round p-3">
                    Welcome to our Kitchen Experience and Food Quality Rating Form!<br><br>
                    Your feedback is invaluable to us as we strive to enhance our kitchen and dining offerings. Kindly take a moment to rate your experience with both our kitchen facilities and the quality of our food. Your ratings and comments will help us understand what we're doing well and areas where we can improve.<br><br>
                    Please rate each criterion on a scale of 1 to 5, with 1 being the lowest and 5 being the highest. Additionally, feel free to provide specific comments or suggestions for each criterion, as well as any general feedback you'd like to share.<br><br>

                    Thank you for helping us provide the best possible experience. Your input matters!
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
                <label for="comment" class="font-bold block mb-2 text-800">Share your thoughts...</label>

                <Prime-Textarea
                    id="comment"
                    v-model="collectComment"
                    placeholder="Please provide your comments"
                    :class="['w-full border-400 border-round p-3', {
                        'p-invalid': true
                    }]"
                    rows="4"
                    aria-describedby="text-error">
                </Prime-Textarea>
            </div>

            <!-- Submint Button -->
            <div class="block px-4">
                <Prime-Button label="Submit Review" class="mt-3 w-full"></Prime-Button>
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
                label: "Portion Size",
                description: "Are the portion sizes appropriate and satisfying?",
                value: 0
            },{
                label: "Variety",
                description: "How diverse and varied are the food options available?",
                value: 0
            },{
                label: "Presentation",
                description: "How appealing is the visual presentation of the dishes?",
                value: 0
            },{
                label: "Freshness",
                description: "How fresh are the ingredients used in the dishes?",
                value: 0
            },{
                label: "Taste",
                description: "How flavorful and delicious is the food?",
                value: 0
            },{
                label: "Overall Food Experience",
                description: "Considering all aspects, how would you rate your overall dining experience in terms of the food?",
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
