<?php

namespace App\helpers;

class HelperComponent
{

    public static function SideBar()
    {
        $prefix="portal";
        return [

            [
                "single_link" => setSingleLink("Dashboard", "ni-dashboard-fill", "dashboard-view","/dashboard"),
            ],
            [

                "menu" => [
                    "title" => 'User Management',
                    'can'=>'user-management-dropdown',
                    "icon" => "ni-user-list-fill",
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
                    "title" => 'Courses',
                    'can'=>'courses-management-dropdown',
                    "icon" => "ni-book-fill",
                    "sub_menu" => [
                        setSubMenu(
                            "Catagories",
                            null,
                            "catagories-view",
                            "/catagories",
                        ),
                        setSubMenu(
                            "Course List",
                            null,
                            "course-list-view",
                            "/course-list",
                        ),
                    ]
            ]
            ],
            [
                "menu" => [
                       "title" => 'Instructor',
                       'can'=>'instructors-management-dropdown',
                       "icon" => "ni-user-fill",
                       "sub_menu" => [
                           setSubMenu(
                               "Instructors",
                               null,
                               "instructors-view",
                               "/instructors",
                           ),
                           setSubMenu(
                               "Instructors Payments",
                               null,
                               "instructors-payments-view",
                               "/instructors-payments",
                           ),
                       ]
               ]
               ],
               [
                "menu" => [
                       "title" => 'Report',
                       'can'=>'reports-management-dropdown',
                       "icon" => "ni-pie-fill",
                       "sub_menu" => [
                           setSubMenu(
                               "Reports",
                               null,
                               "reports-view",
                               "/reports",
                           ),
                       ]
               ]
               ],
               [
                "single_link" => setSingleLink("Students", "ni-users-fill", "students-view", "/students"),
              ],
              [
                "menu" => [
                       "title" => 'Enrolment',
                       'can'=>'enrolment-management-dropdown',
                       "icon" => "ni-property-add",
                       "sub_menu" => [
                           setSubMenu(
                               "Enroll History",
                               null,
                               "enroll-history-view",
                               "/enroll-history",
                           ),
                           setSubMenu(
                               "Enroll a Student",
                               null,
                               "enroll-student-view",
                               "/enroll-student",
                           ),
                       ]
               ]
               ],

            [
                "single_link" => setSingleLink("Messages", "ni-chat-fill", "messages-view", "/messages"),
            ],
            [
                "single_link" => setSingleLink("Admin profile", "ni-account-setting-fill", "admin-profile-view", "/admin-profile"),
            ],
            [
                "menu" => [
                       "title" => 'Invoice',
                       'can'=>'invoice-management-dropdown',
                       "icon" => "ni-file-docs",
                       "sub_menu" => [
                           setSubMenu(
                               "Invoices",
                               null,
                               "invoices-view",
                               "/invoices",
                           ),
                       ]
               ]
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
