<template>
    <ul class="sidebar-nav collapse" :class="{ in: open }">
        <li v-for="(item, index) in list.children"
            :key="'item'+index"
            :class="{ open: item.open }">
            <a :href="item.href" @click="item.open=!item.open">
                <i v-if="item.icon"
                   :class="[{'fa': true}, item.icon ? 'fa-' + item.icon : '']">
                </i>
                {{ item.title }}
                <i class="fa arrow" v-if="item.children"></i>
            </a>
            <sidebar-item-menu v-if="item.children"
                               :list="item"
                               :open="item.open"/>
        </li>
    </ul>
</template>

<script>
    export default {
        props: {
            list: {
                type: Object,
                required: true,
            },
            open: {
                type: Boolean,
                default: false,
            }
        },
    }
</script>
