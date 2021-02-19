<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Serial Code <span class="text-gray-300">- Show</span>
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <link-button :href="route('client.create')">
                    add serial code
                </link-button>
                <div class="col-span-6 sm:col-span-4 mt-5">
                    <div class="bg-white shadow rounded-md overflow-hidden">
                        <!-- List Component -->
                        <div
                            class="flex border-b border-gray-200 items-center px-6 py-3 justify-between"
                            v-for="(code, index) in data"
                            :key="index"
                        >
                            <div class="flex">
                                <div class="flex flex-col">
                                    <div class="font-semibold text-lg">
                                        XCAF 203C 6060
                                    </div>
                                    <span class="text-gray-400"
                                        >Udin Hulala Hula
                                    </span>
                                </div>
                            </div>

                            <div class="hidden md:block">
                                <el-button color="red" class="ml-3">
                                    Delete
                                </el-button>
                            </div>

                            <div class="block md:hidden"></div>
                        </div>
                        <!--  -->
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetDangerButton from "@/Jetstream/DangerButton";
import AppLayout from "@/Layouts/AppLayout";
import LinkButton from "@/Components/LinkButton";
import ElButton from "@/Components/Button";

export default {
    components: {
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        JetDangerButton,
        JetSecondaryButton,
        AppLayout,
        LinkButton,
        ElButton,
    },

    props: ["user"],

    data() {
        return {
            form: this.$inertia.form({
                manually: false,
                code: "",
            }),
            data: [{}, {}, {}],
        };
    },

    methods: {
        deleteCode(id) {
            this.$inertia.post(route("admin.code.delete"));
        },
    },
};
</script>
