<template>
    <inertia-link
        class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none transition ease-in-out duration-150"
        :class="ColourPallete"
    >
        <slot></slot>
    </inertia-link>
</template>

<script>
export default {
    props: ["color"],

    computed: {
        ColourPallete() {
            var selected = this.$props.color || "black";
            var colors = {
                red:
                    "hover:bg-red-500 focus:border-red-700 focus:shadow-outline-red active:bg-red-600 bg-red-600",
                blue:
                    "hover:bg-blue-500 focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-600 bg-blue-600",
                purple:
                    "hover:bg-indigo-500 focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-600 bg-indigo-600",
                black:
                    "hover:bg-gray-700 focus:border-gray-700 focus:shadow-outline-gray active:bg-gray-600 bg-gray-800",
            };

            return colors[selected];
        },
    },
};
</script>
