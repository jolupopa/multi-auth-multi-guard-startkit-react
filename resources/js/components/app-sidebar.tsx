import { NavFooter } from '@/components/nav-footer';
import { NavMain } from '@/components/nav-main';
import { NavUser } from '@/components/nav-user';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { dashboard } from '@/routes';
import  properties  from '@/routes/properties';
import tasks from '@/routes/tasks';
import teams from '@/routes/teams';

import { type NavItem, type SharedData } from '@/types';
import { Link, usePage } from '@inertiajs/react';
import { BookOpen, Folder, LayoutGrid } from 'lucide-react';
import AppLogo from './app-logo';

export function AppSidebar() {
    const { auth } = usePage<SharedData>().props;

    const userType = auth.user?.type;


const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
        icon: LayoutGrid,
    },
];

const clientNavItems: NavItem[] = [
    {
        title: 'Propiedades',
        href: properties.index(),
        icon: LayoutGrid,
    },
];

const agentNavItems: NavItem[] = [
    {
        title: 'Tareas',
        href: tasks.index(),
        icon: LayoutGrid,
    },
];

const companyNavItems: NavItem[] = [
    {
        title: 'Equipos',
        href: teams.index(),
        icon: LayoutGrid,
    },
];

 let typeSpecificNavItems: NavItem[] = [];
    
    switch (userType) {
        case 'client':
            typeSpecificNavItems = clientNavItems;
            break;
        case 'agent':
            typeSpecificNavItems = agentNavItems;
            break;
        case 'company':
            typeSpecificNavItems = companyNavItems;
            break;
        default:
            typeSpecificNavItems = [];
    }

    const mainNavItemsFinal = [...mainNavItems, ...typeSpecificNavItems];






const footerNavItems: NavItem[] = [
    {
        title: 'Repository',
        href: 'https://github.com/laravel/react-starter-kit',
        icon: Folder,
    },
    {
        title: 'Documentation',
        href: 'https://laravel.com/docs/starter-kits#react',
        icon: BookOpen,
    },
];


    return (
        <Sidebar collapsible="icon" variant="inset">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton size="lg" asChild>
                            <Link href={dashboard()} prefetch>
                                <AppLogo />
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>

            <SidebarContent>
                <NavMain items={mainNavItemsFinal} />
            </SidebarContent>

            <SidebarFooter>
                <NavFooter items={footerNavItems} className="mt-auto" />
                <NavUser />
            </SidebarFooter>
        </Sidebar>
    );
}
