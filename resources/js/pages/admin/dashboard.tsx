import React from 'react';
import { AppShell } from '@/components/app-shell';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';
import { router } from '@inertiajs/react';

interface Stats {
    congregational_groups: number;
    church_organizations: number;
    special_events: number;
    diakonia_members: number;
    devotionals: number;
    church_officials: number;
    secretariat_items: number;
    financial_records: number;
}

interface Props {
    stats: Stats;
    [key: string]: unknown;
}

export default function AdminDashboard({ stats }: Props) {
    const managementSections = [
        {
            title: '🏘️ Congregational Groups',
            description: 'Manage the 15 congregational groups',
            count: stats.congregational_groups,
            route: 'admin.congregational-groups.index',
            color: 'bg-blue-50 text-blue-700'
        },
        {
            title: '👥 Church Organizations', 
            description: 'Youth, Women, Men, Seniors, Children',
            count: stats.church_organizations,
            route: '#',
            color: 'bg-green-50 text-green-700'
        },
        {
            title: '✨ Special Events',
            description: 'Communion, Baptism, Confirmation, etc.',
            count: stats.special_events,
            route: '#',
            color: 'bg-purple-50 text-purple-700'
        },
        {
            title: '❤️ Diakonia Care',
            description: 'Sick members care list',
            count: stats.diakonia_members,
            route: '#',
            color: 'bg-red-50 text-red-700'
        },
        {
            title: '📖 Devotionals',
            description: 'Weekly spiritual content',
            count: stats.devotionals,
            route: '#',
            color: 'bg-amber-50 text-amber-700'
        },
        {
            title: '👔 Church Officials',
            description: 'Leadership and organizational structure',
            count: stats.church_officials,
            route: '#',
            color: 'bg-indigo-50 text-indigo-700'
        },
        {
            title: '📢 Secretariat Items',
            description: 'Announcements and church news',
            count: stats.secretariat_items,
            route: '#',
            color: 'bg-cyan-50 text-cyan-700'
        },
        {
            title: '💰 Financial Records',
            description: 'Offerings and contributions',
            count: stats.financial_records,
            route: '#',
            color: 'bg-emerald-50 text-emerald-700'
        }
    ];

    const handleSectionClick = (route: string) => {
        if (route !== '#') {
            router.get(route);
        }
    };

    const goToHome = () => {
        router.get('/');
    };

    return (
        <AppShell>
            <div className="min-h-screen bg-gradient-to-br from-gray-50 to-white">
                <div className="bg-gradient-to-r from-gray-800 to-gray-900 text-white py-12">
                    <div className="max-w-6xl mx-auto px-4">
                        <div className="flex items-center justify-between">
                            <div>
                                <h1 className="text-4xl font-bold mb-2">
                                    ⚙️ Church Admin Panel
                                </h1>
                                <p className="text-gray-300 text-lg">
                                    Manage all church community data and content
                                </p>
                            </div>
                            <Button 
                                variant="secondary" 
                                size="lg"
                                onClick={goToHome}
                                className="bg-blue-600 text-white hover:bg-blue-700"
                            >
                                🏠 Back to Church Portal
                            </Button>
                        </div>
                    </div>
                </div>

                <div className="max-w-6xl mx-auto px-4 py-8">
                    <div className="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        {managementSections.map((section, index) => (
                            <Card 
                                key={index} 
                                className="cursor-pointer hover:shadow-lg transition-shadow duration-200"
                                onClick={() => handleSectionClick(section.route)}
                            >
                                <CardHeader className="pb-3">
                                    <div className="flex items-start justify-between">
                                        <CardTitle className="text-lg font-semibold leading-tight">
                                            {section.title}
                                        </CardTitle>
                                        <Badge 
                                            variant="secondary" 
                                            className={`${section.color} font-mono text-sm`}
                                        >
                                            {section.count}
                                        </Badge>
                                    </div>
                                </CardHeader>
                                <CardContent className="pt-0">
                                    <CardDescription className="text-sm">
                                        {section.description}
                                    </CardDescription>
                                    <div className="mt-4">
                                        {section.route !== '#' ? (
                                            <Button 
                                                size="sm" 
                                                variant="outline"
                                                className="w-full"
                                            >
                                                Manage →
                                            </Button>
                                        ) : (
                                            <Button 
                                                size="sm" 
                                                variant="outline"
                                                disabled
                                                className="w-full opacity-50"
                                            >
                                                Coming Soon
                                            </Button>
                                        )}
                                    </div>
                                </CardContent>
                            </Card>
                        ))}
                    </div>

                    <Card className="mt-8">
                        <CardHeader>
                            <CardTitle className="flex items-center gap-2">
                                📊 Quick Stats Overview
                            </CardTitle>
                        </CardHeader>
                        <CardContent>
                            <div className="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                                <div className="bg-blue-50 p-4 rounded-lg">
                                    <div className="text-2xl font-bold text-blue-600">{stats.congregational_groups}</div>
                                    <div className="text-sm text-gray-600">Groups</div>
                                </div>
                                <div className="bg-green-50 p-4 rounded-lg">
                                    <div className="text-2xl font-bold text-green-600">{stats.church_organizations}</div>
                                    <div className="text-sm text-gray-600">Organizations</div>
                                </div>
                                <div className="bg-red-50 p-4 rounded-lg">
                                    <div className="text-2xl font-bold text-red-600">{stats.diakonia_members}</div>
                                    <div className="text-sm text-gray-600">Care List</div>
                                </div>
                                <div className="bg-purple-50 p-4 rounded-lg">
                                    <div className="text-2xl font-bold text-purple-600">{stats.special_events}</div>
                                    <div className="text-sm text-gray-600">Events</div>
                                </div>
                            </div>
                        </CardContent>
                    </Card>

                    <div className="mt-8 bg-yellow-50 border border-yellow-200 rounded-lg p-6">
                        <h3 className="font-semibold text-yellow-800 mb-2">🚧 Development Status</h3>
                        <p className="text-yellow-700 mb-3">
                            Currently, only Congregational Groups management is fully implemented. 
                            Other sections are planned for future releases.
                        </p>
                        <p className="text-sm text-yellow-600">
                            The church community platform focuses on user-friendly design optimized for seniors (60+) 
                            and mobile responsiveness (Android 4+ compatible).
                        </p>
                    </div>
                </div>
            </div>
        </AppShell>
    );
}