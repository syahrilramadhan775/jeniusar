<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Serial Code <span class="text-gray-300">- Show</span>
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <link-button
                        :href="route('license.create')"
                        class="mt-3 shadow-md"
                    >
                        add Users
                    </link-button>

                    <!-- Input Search -->
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <!-- <div
                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                        ></div> -->
                        <input
                            type="text"
                            name="price"
                            id="price"
                            class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-3 pr-12 py-2 sm:text-sm md:text-base bg-white border-transparent rounded-md"
                            placeholder="Name"
                            v-on:input="searchCode"
                        />
                        <div
                            class="absolute inset-y-0 right-0 flex items-center pr-3 pl-2"
                        >
                            <svg
                                class="w-5 h-5 text-gray-500"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                ></path>
                            </svg>
                        </div>
                    </div>
                    <!-- End Input Search -->
                </div>
                <div class="col-span-6 sm:col-span-4 mt-5">
                    <div class="bg-white shadow rounded-md overflow-hidden">
                        <!-- List Component -->
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Username
                                    </th>

                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Email
                                    </th>

                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Name
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Active At
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Verification Code
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <!-- Username -->
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-gray-600"
                                    >
                                        Regional Paradigm Technician
                                    </td>
                                    <!-- End Username Table -->

                                    <!-- Username -->
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-gray-600 text-sm"
                                    >
                                        Regional Paradigm Technician
                                    </td>
                                    <!-- End Username Table -->

                                    <!-- Name -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div>
                                                <div
                                                    class="text-sm font-medium text-gray-900"
                                                >
                                                    Jane Cooper
                                                </div>
                                                <div
                                                    class="text-sm text-gray-500"
                                                >
                                                    jane.cooper@example.com
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- End Name Table -->

                                    <!-- Name -->
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-gray-600 text-sm"
                                    >
                                        Today
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                                    >
                                        2CUT RRCO AZRJ
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                                    >
                                        <a
                                            href="#"
                                            class="text-indigo-600 hover:text-indigo-900"
                                            >Edit</a
                                        >
                                        <a
                                            href="#"
                                            class="text-red-600 hover:text-red-900 ml-5"
                                            >Delete</a
                                        >
                                    </td>
                                </tr>

                                <!-- More items... -->
                            </tbody>
                        </table>
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

    props: {
        licenses: Array,
    },

    data() {
        return {
            form: this.$inertia.form({
                manually: false,
                code: "",
            }),
            hasHidden: [], //hidden
        };
    },

    methods: {
        deleteCode(id) {
            let _this = this;
            this.$inertia.delete(route("license.destroy", { license: id }), {
                onSuccess() {
                    _this.hasHidden = [];
                },
            });
        },
        convertToFormat(code = "") {
            let rebuildString = "";

            for (
                let sliceIndex = 0;
                sliceIndex <= code.length;
                sliceIndex += 4
            ) {
                rebuildString += code.substr(sliceIndex, 4) + " ";
            }
            return rebuildString.toUpperCase();
        },
        searchCode(event) {
            let search = event.target.value
                .replaceAll(" ", "")
                .toLocaleLowerCase();

            this.hasHidden = [];
            if (search !== "")
                this.licenses.forEach((value) =>
                    this.hasHidden.push(value.licence.indexOf(search) < 0)
                );
            // if (keyCode === 13)
            //     this.$inertia.get(route("license.index") + "?search=" + search);

            // console.log({ keyCode, event });
            console.log(this.hasHidden, this.licenses);
        },
    },
};
</script>
