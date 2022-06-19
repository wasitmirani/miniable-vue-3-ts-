

let sidebar_menu=[
    {
      "heading": "Analytics"
    },
    {
      "title": "Dashboard",
      "type": "single_link",
      "icon": "uil-home-alt",
      "can": "dashboard-view",
      "route": "/portal/dashboard"
    },
    {
      "heading": "Management"
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
          "can": "users-view",
          "route": "/portal/users"
        },
        {
          "title": "Roles",
          "icon": null,
          "can": "roles-view",
          "route": "/portal/roles"
        },
        {
          "title": "Permissions",
          "icon": null,
          "can": "permissions-view",
          "route": "/portal/permissions"
        }
      ]
    },
    {
        "heading": "Leads Management",
        "can":"leads-management-heading",
    },
    {
      "heading": "Leads Management",
      "can":"leads-management-heading",
    },
    {
      "title": "Leads Management",
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
      "heading": "Tools"
    },
    {
      "title": "Settings",
      "type": "single_link",
      "icon": "uil-cog",
      "can": "settings-view",
      "route": "/portal/settings"
    },
    {
      "title": "Log out",
      "type": "single_link",
      "icon": "uil-sign-out-alt",
      "can": "services-view",
      "route": "/portal/logout"
    }
  ];

export default sidebar_menu;
