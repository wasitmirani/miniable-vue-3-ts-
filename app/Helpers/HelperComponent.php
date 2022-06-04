<?php

namespace App\helpers;

class HelperComponent
{

    public static function SideBar()
    {
        $prefix="portal";
        return [
            [
                "heading" => "Analytics",

            ],

                 setSingleLink("Dashboard", "uil-home-alt", "dashboard-view","/dashboard"),
            [
                "heading" => "Management",

            ],
         [

                    "title" => 'User Management',
                    'can'=>'user-management-dropdown',
                    "icon" => "uil-users-alt",
                    'type'=>'multi',
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

            [
                "heading" => "Leads Management",

            ],
            [

                "title" => 'Leads Management',
                'can'=>'user-management-dropdown',
                "icon" => "uil-facebook-messenger",
                'type'=>'multi',
                "sub_menu" => [
                    setSubMenu(
                        "Users",
                        null,
                        "users-view",
                        "/leads-users",
                    ),
               

                ]

        ],
        [

            "title" => 'Leads Sys',
            'can'=>'user-management-dropdown',
            "icon" => "uil-facebook-messenger",
            'type'=>'multi',
            "sub_menu" => [
                setSubMenu(
                    "Users Leads",
                    null,
                    "users-view",
                    "/users-leads",
                ),



            ]

    ],
            [
                "heading" => "Tools",

            ],

          setSingleLink("Settings","uil-cog", "settings-view", "/settings"),
          setSingleLink("Log out","uil-sign-out-alt", "services-view", "/logout"),


        ];
    }
}
