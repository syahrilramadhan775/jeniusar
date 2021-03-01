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
                        add serial code
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
                            placeholder="Serial Code"
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
                        <div
                            class="flex border-b border-gray-200 items-center px-6 py-3 justify-between"
                            v-for="(license, index) in licenses"
                            :key="index"
                            :class="{ hidden: hasHidden[index] }"
                        >
                            <div class="flex items-center">
                                <button
                                    class="mr-2 hover:bg-gray-300 p-2 rounded-full transition-colors focus:bg-gray-400 outline-none border-none"
                                    @click="selectItem(license.licence)"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"
                                        ></path>
                                    </svg>
                                </button>
                                <div class="flex flex-col">
                                    <div class="font-semibold text-lg">
                                        {{ convertToFormat(license.licence) }}
                                    </div>
                                    <span
                                        class="text-gray-400"
                                        v-if="license.users"
                                        >{{ license.users.profile.name }}
                                    </span>
                                    <span class="text-green-700" v-else>
                                        Available
                                    </span>
                                </div>
                            </div>
                            <button
                                class="mr-2 hover:bg-gray-300 p-2 rounded-full transition-colors focus:bg-gray-400 outline-none border-none"
                                v-on:click="deleteCode(license.id)"
                            >
                                <svg
                                    class="w-6 h-6 text-red-500"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                    ></path>
                                </svg>
                            </button>

                            <div class="block md:hidden"></div>
                        </div>
                        <!--  -->
                    </div>
                </div>
            </div>

            <jet-dialog-modal :show="modalShow" @close="OnCloseModal">
                <template #title> Serial Code </template>

                <template #content>
                    <div class="md:grid grid-flow-col gap-3">
                        <div class="col-span-9">
                            <qrcode-vue
                                :value="selectedItem"
                                size="250"
                                class="w-full"
                            />
                        </div>
                        <div class="mt-4 col-span-5 flex flex-col">
                            <div>
                                <jet-label value="Resolution" />
                                <jet-input
                                    type="text"
                                    class="mt-1 block w-25"
                                    placeholder="resolution"
                                    ref="text"
                                    v-model="resolution"
                                />
                            </div>

                            <!-- <jet-label value="Type" class="mt-3 mb-2" />
                            <jet-dropdown align="left" width="48">
                                <template #trigger>
                                    <el-button>
                                        {{
                                            selectedType === "canvas"
                                                ? "JPEG"
                                                : "SVG"
                                        }}
                                    </el-button>
                                </template>

                                <template #content>
                                    <div
                                        class="block px-4 py-2 text-xs text-gray-400"
                                    >
                                        Choose Type
                                    </div>

                                    <jet-dropdown-link
                                        as="button"
                                        @click="selectedType = 'canvas'"
                                    >
                                        JPEG
                                    </jet-dropdown-link>

                                    <jet-dropdown-link
                                        as="button"
                                        @click="selectedType = 'svg'"
                                    >
                                        SVG
                                    </jet-dropdown-link>
                                </template>
                            </jet-dropdown> -->
                        </div>
                    </div>

                    <!-- Hidden Layer -->
                    <div class="hidden">
                        <qrcode-vue
                            :value="selectedItem"
                            :size="resolution"
                            :type="selectedType"
                            ref="hidden-canvas"
                        />
                    </div>
                </template>

                <template #footer>
                    <jet-button @click.native="downloadCanvas">
                        Download
                    </jet-button>
                </template>
            </jet-dialog-modal>
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
import QrcodeVue from "qrcode.vue";
import JetDialogModal from "@/Jetstream/DialogModal";
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";

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
        QrcodeVue,
        JetDialogModal,
        JetDropdown,
        JetDropdownLink,
    },

    props: {
        licenses: Array,
    },

    data() {
        const DataCanvasItem = {
            selectedItem: "empty",
            // selectedType: "canvas",
            resolution: 250,
        };

        return {
            form: this.$inertia.form({
                manually: false,
                code: "",
            }),
            hasHidden: [], //hidden
            modalShow: false,

            ...DataCanvasItem,
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
        },
        OnCloseModal() {
            this.modalShow = false;
        },

        selectItem(code) {
            this.selectedItem = code;

            this.modalShow = true;
        },

        downloadCanvas() {
            var canvas = this.$refs["hidden-canvas"].$el;
            var selectedItem = this.selectedItem;

            canvas.toBlob(function (blob) {
                const anchor = document.createElement("a");
                anchor.download = selectedItem;
                anchor.href = URL.createObjectURL(blob);
                //
                anchor.click();

                URL.revokeObjectURL(anchor.href);
            }, "image/jpeg");

            this.modalShow = false;
        },
    },
};
</script>
