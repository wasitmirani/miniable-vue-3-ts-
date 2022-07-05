

let sidebar_menu=[
    {
      "heading": "Analytics",
      "can":"analytics-heading-view"
    },
    {
      "title": "Dashboard",
      "type": "single_link",
      "icon": "uil-home-alt",
      "can": "dashboard-view",
      "route": "/portal/dashboard"
    },
    {
      "heading": "Management",
      "can":"management-heading-view"
    },
    {
      "title": "User Management",
      "can": "user-management-dropdown",
      "icon": "uil-users-alt",
      "type": "multi",
      "sub_menu": [
        {
          "title": "Users",
          "icon": null,
          "can": "users-list-view",
          "route": "/portal/users"
        },
        {
          "title": "Roles",
          "icon": null,
          "can": "roles-list-view",
          "route": "/portal/roles"
        },
        {
          "title": "Permissions",
          "icon": null,
          "can": "permissions-list-view",
          "route": "/portal/permissions"
        }
      ]
    },
    {
        "heading": "Utilitys",
        "can":"utilitys-heading-view",
    },
    {
        "title": "Utility Management",
        "can": "utility-management-dropdown",
        "icon": "uil-file-alt",
        "type": "multi",
        "sub_menu": [
          {
            "title": "Auditors",
            "icon": null,
            "can": "auditors-list-view",
            "route": "/portal/auditors"
          }
        ]
      },
    {
      "heading": "Leads Management",
      "can":"leads-management-heading-view",
    },
    {
      "title": "Audit Management",
      "can": "leads-management-dropdown",
      "icon": "uil-invoice",
      "type": "multi",
      "sub_menu": [
        {
          "title": "Audits",
          "icon": null,
          "can": "audits-view",
          "route": "/portal/audits"
        }
      ]
    },

    {
      "heading": "Tools",
      "can":"tools-heading-view",
    },
    {
      "title": "Settings",
      "type": "single_link",
      "icon": "uil-cog",
      "can": "settings-view",
      "route": "/portal/settings"
    },
    // {
    //   "title": "Log out",
    //   "type": "single_link",
    //   "icon": "uil-sign-out-alt",
    //   "can": "session-view",
    //   "route": "/portal/logout"
    // }
  ];

export default sidebar_menu;
