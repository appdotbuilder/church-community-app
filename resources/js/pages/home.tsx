import React from 'react';
import { AppShell } from '@/components/app-shell';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Badge } from '@/components/ui/badge';

import { router } from '@inertiajs/react';

interface CongregationalGroup {
    id: number;
    name: string;
    description?: string;
    schedule?: Record<string, unknown>[];
    is_active: boolean;
}

interface ChurchOrganization {
    id: number;
    name: string;
    type: string;
    description?: string;
    schedule?: Record<string, unknown>[];
    is_active: boolean;
}

interface SpecialEvent {
    id: number;
    name: string;
    type: string;
    description?: string;
    scheduled_at?: string;
    additional_info?: Record<string, unknown>;
    is_active: boolean;
}

interface DiakoniaMember {
    id: number;
    name: string;
    domicile_group: string;
    place_of_care: string;
    condition?: string;
    care_started?: string;
    is_active: boolean;
}

interface Devotional {
    id: number;
    title: string;
    content: string;
    scripture_reference?: string;
    week_starting: string;
    is_published: boolean;
}

interface ChurchOfficial {
    id: number;
    name: string;
    position: string;
    department?: string;
    description?: string;
    order_priority: number;
    is_active: boolean;
}

interface SecretariatItem {
    id: number;
    title: string;
    content: string;
    type: string;
    published_date: string;
    is_published: boolean;
}

interface FinancialRecord {
    id: number;
    description: string;
    type: string;
    amount: number;
    received_date: string;
    contributor?: string;
    notes?: string;
    is_published: boolean;
}

interface Props {
    congregationalGroups: CongregationalGroup[];
    churchOrganizations: ChurchOrganization[];
    specialEvents: SpecialEvent[];
    diakoniaMembers?: DiakoniaMember[];
    currentDevotional?: Devotional;
    churchOfficials?: ChurchOfficial[];
    secretariatItems?: SecretariatItem[];
    financialRecords: FinancialRecord[];
    isAuthenticated: boolean;
    isAdmin: boolean;
    [key: string]: unknown;
}

const organizationTypeLabels = {
    youth: '👥 Youth',
    children: '👶 Children/Sunday School',
    women: '👩 Women\'s Fellowship',
    men: '👨 Men\'s Fellowship',
    seniors: '👴 Seniors'
};

const eventTypeLabels = {
    communion: '🍞 Holy Communion',
    baptism: '💧 Holy Baptism',
    confession: '🙏 Confession of Faith',
    confirmation: '✝️ Confirmation',
    wedding: '💒 Wedding Blessing'
};

const secretariatTypeLabels = {
    birthday: '🎂 Birthday Greetings',
    new_member: '🆕 New Members',
    intern: '👨‍🎓 Interns',
    diakonia_update: '❤️ Diakonia Committee',
    worship_update: '⛪ Worship Committee',
    special_offering: '💰 Special Offerings',
    council_decision: '📋 Council Decisions'
};

const financialTypeLabels = {
    offering: '💝 Regular Offerings',
    special_envelope: '✉️ Special Envelopes',
    individual_contribution: '🤲 Individual Contributions'
};

export default function Home({ 
    congregationalGroups, 
    churchOrganizations, 
    specialEvents, 
    diakoniaMembers,
    currentDevotional,
    churchOfficials,
    secretariatItems,
    financialRecords,
    isAuthenticated,
    isAdmin
}: Props) {
    const formatCurrency = (amount: number) => {
        return new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD'
        }).format(amount);
    };

    const formatDate = (dateString: string) => {
        return new Date(dateString).toLocaleDateString();
    };

    const goToAdmin = () => {
        router.get('/admin');
    };

    return (
        <AppShell>
            <div className="min-h-screen bg-gradient-to-br from-blue-50 to-white">
                {/* Hero Section */}
                <div className="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-16">
                    <div className="max-w-6xl mx-auto px-4 text-center">
                        <h1 className="text-4xl md:text-6xl font-bold mb-4">
                            ⛪ Church Community
                        </h1>
                        <p className="text-xl md:text-2xl opacity-90 mb-8">
                            Stay connected with our church family and community activities
                        </p>
                        
                        {!isAuthenticated && (
                            <div className="flex flex-col sm:flex-row gap-4 justify-center">
                                <Button 
                                    size="lg" 
                                    variant="secondary"
                                    onClick={() => router.get('/login')}
                                    className="bg-white text-blue-600 hover:bg-blue-50"
                                >
                                    🔐 Member Login
                                </Button>
                                <Button 
                                    size="lg" 
                                    variant="outline"
                                    onClick={() => router.get('/register')}
                                    className="border-white text-white hover:bg-white hover:text-blue-600"
                                >
                                    ✋ Join Our Community
                                </Button>
                            </div>
                        )}

                        {isAdmin && (
                            <div className="mt-6">
                                <Button 
                                    size="lg" 
                                    variant="secondary"
                                    onClick={goToAdmin}
                                    className="bg-yellow-500 text-black hover:bg-yellow-400"
                                >
                                    ⚙️ Admin Panel
                                </Button>
                            </div>
                        )}
                    </div>
                </div>

                <div className="max-w-6xl mx-auto px-4 py-8 space-y-8">
                    
                    {/* Sunday Service & Schedules */}
                    <Card>
                        <CardHeader>
                            <CardTitle className="flex items-center gap-2">
                                📅 Weekly Schedules
                            </CardTitle>
                            <CardDescription>
                                Sunday service and congregational group meetings
                            </CardDescription>
                        </CardHeader>
                        <CardContent className="space-y-6">
                            <div>
                                <h3 className="font-semibold text-lg mb-3">📿 Sunday Service</h3>
                                <div className="bg-blue-50 p-4 rounded-lg">
                                    <p className="font-medium">Every Sunday - 10:00 AM</p>
                                    <p className="text-gray-600">Main sanctuary worship service</p>
                                </div>
                            </div>
                            
                            <div>
                                <h3 className="font-semibold text-lg mb-3">🏘️ Congregational Groups</h3>
                                <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    {congregationalGroups.map((group) => (
                                        <div key={group.id} className="bg-gray-50 p-4 rounded-lg">
                                            <h4 className="font-medium">{group.name}</h4>
                                            {group.description && (
                                                <p className="text-sm text-gray-600 mt-1">{group.description}</p>
                                            )}
                                        </div>
                                    ))}
                                </div>
                            </div>

                            <div>
                                <h3 className="font-semibold text-lg mb-3">👥 Church Organizations</h3>
                                <div className="grid md:grid-cols-2 gap-4">
                                    {churchOrganizations.map((org) => (
                                        <div key={org.id} className="bg-gray-50 p-4 rounded-lg">
                                            <h4 className="font-medium">
                                                {organizationTypeLabels[org.type as keyof typeof organizationTypeLabels] || org.name}
                                            </h4>
                                            {org.description && (
                                                <p className="text-sm text-gray-600 mt-1">{org.description}</p>
                                            )}
                                        </div>
                                    ))}
                                </div>
                            </div>
                        </CardContent>
                    </Card>

                    {/* Special Events */}
                    {specialEvents.length > 0 && (
                        <Card>
                            <CardHeader>
                                <CardTitle className="flex items-center gap-2">
                                    ✨ Special Events
                                </CardTitle>
                                <CardDescription>
                                    Upcoming sacramental and special church events
                                </CardDescription>
                            </CardHeader>
                            <CardContent>
                                <div className="grid md:grid-cols-2 gap-4">
                                    {specialEvents.map((event) => (
                                        <div key={event.id} className="bg-gradient-to-r from-purple-50 to-blue-50 p-4 rounded-lg">
                                            <h4 className="font-medium">
                                                {eventTypeLabels[event.type as keyof typeof eventTypeLabels] || event.name}
                                            </h4>
                                            {event.scheduled_at && (
                                                <p className="text-sm text-blue-600 font-medium">
                                                    📅 {formatDate(event.scheduled_at)}
                                                </p>
                                            )}
                                            {event.description && (
                                                <p className="text-sm text-gray-600 mt-1">{event.description}</p>
                                            )}
                                        </div>
                                    ))}
                                </div>
                            </CardContent>
                        </Card>
                    )}

                    {/* Financial Information - Visible to all */}
                    <Card>
                        <CardHeader>
                            <CardTitle className="flex items-center gap-2">
                                💰 Financial Reports
                            </CardTitle>
                            <CardDescription>
                                Recent contributions and offerings (publicly available)
                            </CardDescription>
                        </CardHeader>
                        <CardContent>
                            <div className="space-y-4">
                                {financialRecords.map((record) => (
                                    <div key={record.id} className="flex justify-between items-center py-2 border-b">
                                        <div>
                                            <p className="font-medium">
                                                {financialTypeLabels[record.type as keyof typeof financialTypeLabels]} - {record.description}
                                            </p>
                                            <p className="text-sm text-gray-600">
                                                📅 {formatDate(record.received_date)}
                                                {record.contributor && ` • From: ${record.contributor}`}
                                            </p>
                                        </div>
                                        <Badge variant="secondary" className="font-mono">
                                            {formatCurrency(record.amount)}
                                        </Badge>
                                    </div>
                                ))}
                            </div>
                        </CardContent>
                    </Card>

                    {/* Member-only sections */}
                    {isAuthenticated ? (
                        <>
                            {/* Diakonia Section */}
                            {diakoniaMembers && diakoniaMembers.length > 0 && (
                                <Card>
                                    <CardHeader>
                                        <CardTitle className="flex items-center gap-2">
                                            ❤️ Diakonia Care List
                                        </CardTitle>
                                        <CardDescription>
                                            Members needing our prayers and care
                                        </CardDescription>
                                    </CardHeader>
                                    <CardContent>
                                        <div className="space-y-4">
                                            {diakoniaMembers.map((member) => (
                                                <div key={member.id} className="bg-red-50 p-4 rounded-lg">
                                                    <h4 className="font-medium">{member.name}</h4>
                                                    <p className="text-sm text-gray-600">
                                                        🏘️ Group: {member.domicile_group} • 
                                                        🏥 Care: {member.place_of_care}
                                                    </p>
                                                    {member.condition && (
                                                        <p className="text-sm text-gray-700 mt-1">{member.condition}</p>
                                                    )}
                                                </div>
                                            ))}
                                        </div>
                                    </CardContent>
                                </Card>
                            )}

                            {/* Current Devotional */}
                            {currentDevotional && (
                                <Card>
                                    <CardHeader>
                                        <CardTitle className="flex items-center gap-2">
                                            📖 Weekly Devotional
                                        </CardTitle>
                                        <CardDescription>
                                            Week of {formatDate(currentDevotional.week_starting)}
                                        </CardDescription>
                                    </CardHeader>
                                    <CardContent>
                                        <div className="bg-green-50 p-6 rounded-lg">
                                            <h3 className="font-bold text-lg mb-3">{currentDevotional.title}</h3>
                                            {currentDevotional.scripture_reference && (
                                                <p className="text-blue-600 font-medium mb-3">
                                                    📜 {currentDevotional.scripture_reference}
                                                </p>
                                            )}
                                            <div className="prose max-w-none">
                                                <p className="whitespace-pre-wrap">{currentDevotional.content}</p>
                                            </div>
                                        </div>
                                    </CardContent>
                                </Card>
                            )}

                            {/* Church Officials */}
                            {churchOfficials && churchOfficials.length > 0 && (
                                <Card>
                                    <CardHeader>
                                        <CardTitle className="flex items-center gap-2">
                                            👔 Church Leadership
                                        </CardTitle>
                                        <CardDescription>
                                            Organizational structure and officeholders
                                        </CardDescription>
                                    </CardHeader>
                                    <CardContent>
                                        <div className="grid md:grid-cols-2 gap-4">
                                            {churchOfficials.map((official) => (
                                                <div key={official.id} className="bg-blue-50 p-4 rounded-lg">
                                                    <h4 className="font-medium">{official.name}</h4>
                                                    <p className="text-blue-600 font-medium">{official.position}</p>
                                                    {official.department && (
                                                        <p className="text-sm text-gray-600">{official.department}</p>
                                                    )}
                                                    {official.description && (
                                                        <p className="text-sm text-gray-700 mt-1">{official.description}</p>
                                                    )}
                                                </div>
                                            ))}
                                        </div>
                                    </CardContent>
                                </Card>
                            )}

                            {/* Secretariat Items */}
                            {secretariatItems && secretariatItems.length > 0 && (
                                <Card>
                                    <CardHeader>
                                        <CardTitle className="flex items-center gap-2">
                                            📢 Church Announcements
                                        </CardTitle>
                                        <CardDescription>
                                            Recent updates from the church secretariat
                                        </CardDescription>
                                    </CardHeader>
                                    <CardContent>
                                        <div className="space-y-4">
                                            {secretariatItems.map((item) => (
                                                <div key={item.id} className="bg-yellow-50 p-4 rounded-lg">
                                                    <div className="flex justify-between items-start mb-2">
                                                        <h4 className="font-medium">{item.title}</h4>
                                                        <Badge variant="outline">
                                                            {secretariatTypeLabels[item.type as keyof typeof secretariatTypeLabels]}
                                                        </Badge>
                                                    </div>
                                                    <p className="text-sm text-gray-700 mb-2">{item.content}</p>
                                                    <p className="text-xs text-gray-500">
                                                        📅 {formatDate(item.published_date)}
                                                    </p>
                                                </div>
                                            ))}
                                        </div>
                                    </CardContent>
                                </Card>
                            )}
                        </>
                    ) : (
                        <Card>
                            <CardContent className="text-center py-12">
                                <div className="text-6xl mb-4">🔒</div>
                                <h3 className="text-xl font-semibold mb-2">Member-Only Content</h3>
                                <p className="text-gray-600 mb-6">
                                    Login to access devotionals, diakonia care list, church announcements, and more member resources.
                                </p>
                                <div className="flex flex-col sm:flex-row gap-4 justify-center">
                                    <Button onClick={() => router.get('/login')}>
                                        🔐 Login
                                    </Button>
                                    <Button variant="outline" onClick={() => router.get('/register')}>
                                        ✋ Join Our Community
                                    </Button>
                                </div>
                            </CardContent>
                        </Card>
                    )}
                </div>
            </div>
        </AppShell>
    );
}