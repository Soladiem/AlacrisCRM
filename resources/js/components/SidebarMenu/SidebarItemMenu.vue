<template>
    <ul class="sidebar-nav collapse" :class="{ in: isCollapsed }">
        <li v-for="item in menu" :class="{ open: isCollapsed }">
            <a :href="item.href">
                <i :class="'fa ' + item.icon"
                   v-if="item.icon">
                </i> {{ item.title }}
                <i class="fa arrow" v-if="item.child && item.child.length"></i>
            </a>
            <sidebar-item-menu
                v-if="item.child && item.child.length"
                :menu="item.child"
            />
        </li>
    </ul>
</template>

<script>
    export default {
        props: {
            menu: {
                type: Array,
                required: true
            },
            collapsed: {
                type: Boolean,
                default: false
            }
        },
        data() {
            return {
                isCollapsed: this.collapsed,
            }
        },
    }
</script>
