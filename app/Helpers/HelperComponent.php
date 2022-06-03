<?php

namespace App\helpers;

class HelperComponent
{

    public static function SideBar()
    {
        $prefix="portal";
        return (object)[
            [
                "heading" => "Analytics",

            ],
            [
                "single_link" => setSingleLink("Dashboard", "uil-home-alt", "dashboard-view","/dashboard"),
            ],
            [
                "heading" => "Management",

            ],
            [

                "menu" => [
                    "title" => 'User Management',
                    'can'=>'user-management-dropdown',
                    "icon" => "uil-users-alt",
                    "sub_menu" => [
                        setSubMenu(
                            "Users",
                            null,
                            "users-view",
                            "/users",
                        ),
                        setSubMenu(
                            "Roles",
                            null,
                            "roles-view",
                            "/roles",
                        ),
                        setSubMenu(
                            "Permissions",
                            null,
                            "permissions-view",
                            "/permissions",
                        ),

                    ]

                ],

            ],
            [

                "menu" => [
                    "title" => 'Test Management',
                    'can'=>'user-management-dropdown',
                    "icon" => "uil-users-alt",
                    "sub_menu" => [
                        setSubMenu(
                            "Users",
                            null,
                            "users-view",
                            "/users",
                        ),
                        setSubMenu(
                            "Roles",
                            null,
                            "roles-view",
                            "/roles",
                        ),
                        setSubMenu(
                            "Permissions",
                            null,
                            "permissions-view",
                            "/permissions",
                        ),

                    ]

                ],

            ],

            [
                "heading" => "Tools",

            ],
            [
                "single_link" => setSingleLink("Settings", "ni-setting-alt-fill", "settings-view", "/settings"),
            ],
            [
                "single_link" => setSingleLink("Log out", "ni-signout", "services-view", "/logout"),
            ],

        ];
    }
}
