<template>
    <nav class="menu">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li v-for="item in menu">
                <a :href="item.href">
                    <i :class="'fa ' + item.icon"
                       v-if="item.icon">
                    </i> {{ item.title }}
                    <i class="fa arrow"
                       v-if="item.child && item.child.length"></i>
                </a>
                <sidebar-item-menu :menu="item.child"
                                   v-if="item.child">
                </sidebar-item-menu>
            </li>
        </ul>
    </nav>
</template>

<script>
    import SidebarItemMenu from "./SidebarItemMenu";

    export default {
        components: {SidebarItemMenu},
        data() {
            return {
                menu: [
                    {
                        href: '#1',
                        title: 'Dashboard',
                        icon: 'fa-home'
                    },
                    {
                        href: '#2',
                        title: 'Menu Levels',
                        icon: 'fa-sitemap',
                        child: [
                            {
                                href: '',
                                title: 'Second Level Item',
                                icon: '',
                                child: [
                                    {
                                        href: '',
                                        title: 'Third Level Item (1)',
                                        icon: '',
                                    },
                                    {
                                        href: '',
                                        title: 'Third Level Item (2)',
                                        icon: '',
                                    },
                                ]
                            },
                            {
                                href: '',
                                title: 'Second Level Item',
                                icon: 'fa-github-alt',
                            },
                            {
                                href: '',
                                title: 'Second Level Item',
                                icon: '',
                                child: [
                                    {
                                        href: '',
                                        title: 'Third Level Item',
                                        icon: '',
                                    },
                                    {
                                        href: '',
                                        title: 'Third Level Item',
                                        icon: '',
                                    },
                                    {
                                        href: '',
                                        title: 'Third Level Item',
                                        icon: '',
                                        child: [
                                            {
                                                href: '',
                                                title: 'Fourth Level Item (1)',
                                                icon: '',
                                            },
                                            {
                                                href: '',
                                                title: 'Fourth Level Item (2)',
                                                icon: '',
                                            }
                                        ]
                                    }
                                ]
                            }
                        ]
                    },
                ]
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../../sass/variables';

    .sidebar-menu {
        font-size: 14px;
        list-style: none;
        margin: 0;
        padding: 0;

        // Common styles
        li {
            a:focus,
            .open & a:focus {
                background-color: inherit;
            }
        }

        // Second + menu items
        ul {
            padding: 0;
            height: 0;
            overflow: hidden;

            body & {
                height: auto;
            }

            &.collapse {
                &.in {
                    display: block;
                }
            }
        }

        li.active ul {
            height: auto;
        }


        // All links which are not active
        // have subdued color
        li a {
            color: $sidebar-color-text;
            text-decoration: none;
            display: block;
        }

        // All links which are not active
        // On hover bg become darker
        // Their color become lighter
        li a:hover,
        li.open > a,
        li.open a:hover {
            color: $sidebar-color-text-active;
            background-color: $sidebar-color-secondary;
        }

        .arrow {
            float: right;
            font-size: 18px;
            line-height: initial;
            transition: all 0.3s ease;
            margin-right: 0;

            &:before {
                content: "\f105" !important;
            }
        }

        li.open > a {
            .arrow {
                transform: rotate(90deg);
            }
        }

        // First level items
        & > li {

            // First level items links
            & > a {
                padding: 15px 15px 15px 20px;
            }

            // First level active links have primary background
            &.active > a,
            &.active > a:hover {
                background-color: $color-primary !important;
                color: $color-text-inverse !important;
            }

            // First level active links have bit darker background
            &.open > a {
                background-color: darken($sidebar-color-primary, 3%);
            }

            // First level item links arrow
            & > a {
                i {
                    margin-right: 5px;
                    font-size: 16px;

                    &.arrow {
                        font-size: 20px;
                    }
                }
            }

        }

        // Second level items
        & > li > .sidebar-nav > li {

            // Second level and deeper items links
            // Have bit darker background and more padding
            // from left side
            a {
                padding: 10px 15px 10px 50px;
                background-color: darken($sidebar-color-primary, 3%);
            }

            // Second level active items links
            // Have brighter color
            &.active a {
                color: $sidebar-color-text-active;
            }

            // Third level items
            & > .sidebar-nav > li {
                a {
                    padding-left: 60px;
                    padding-right: 15px;
                }

                & > .sidebar-nav > li {
                    a {
                        padding-left: 70px;
                    }
                }
            }
        }
    }
</style>
