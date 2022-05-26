<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 18,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 21,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 22,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 23,
                'title' => 'team_create',
            ],
            [
                'id'    => 24,
                'title' => 'team_edit',
            ],
            [
                'id'    => 25,
                'title' => 'team_show',
            ],
            [
                'id'    => 26,
                'title' => 'team_delete',
            ],
            [
                'id'    => 27,
                'title' => 'team_access',
            ],
            [
                'id'    => 28,
                'title' => 'mycompany_access',
            ],
            [
                'id'    => 29,
                'title' => 'wiki_access',
            ],
            [
                'id'    => 30,
                'title' => 'typecompany_create',
            ],
            [
                'id'    => 31,
                'title' => 'typecompany_edit',
            ],
            [
                'id'    => 32,
                'title' => 'typecompany_show',
            ],
            [
                'id'    => 33,
                'title' => 'typecompany_delete',
            ],
            [
                'id'    => 34,
                'title' => 'typecompany_access',
            ],
            [
                'id'    => 35,
                'title' => 'typeperevoz_create',
            ],
            [
                'id'    => 36,
                'title' => 'typeperevoz_edit',
            ],
            [
                'id'    => 37,
                'title' => 'typeperevoz_show',
            ],
            [
                'id'    => 38,
                'title' => 'typeperevoz_delete',
            ],
            [
                'id'    => 39,
                'title' => 'typeperevoz_access',
            ],
            [
                'id'    => 40,
                'title' => 'country_create',
            ],
            [
                'id'    => 41,
                'title' => 'country_edit',
            ],
            [
                'id'    => 42,
                'title' => 'country_show',
            ],
            [
                'id'    => 43,
                'title' => 'country_delete',
            ],
            [
                'id'    => 44,
                'title' => 'country_access',
            ],
            [
                'id'    => 45,
                'title' => 'mycompan_create',
            ],
            [
                'id'    => 46,
                'title' => 'mycompan_edit',
            ],
            [
                'id'    => 47,
                'title' => 'mycompan_show',
            ],
            [
                'id'    => 48,
                'title' => 'mycompan_delete',
            ],
            [
                'id'    => 49,
                'title' => 'mycompan_access',
            ],
            [
                'id'    => 50,
                'title' => 'typedolgnosti_create',
            ],
            [
                'id'    => 51,
                'title' => 'typedolgnosti_edit',
            ],
            [
                'id'    => 52,
                'title' => 'typedolgnosti_show',
            ],
            [
                'id'    => 53,
                'title' => 'typedolgnosti_delete',
            ],
            [
                'id'    => 54,
                'title' => 'typedolgnosti_access',
            ],
            [
                'id'    => 55,
                'title' => 'autoparkmenu_access',
            ],
            [
                'id'    => 56,
                'title' => 'driver_create',
            ],
            [
                'id'    => 57,
                'title' => 'driver_edit',
            ],
            [
                'id'    => 58,
                'title' => 'driver_show',
            ],
            [
                'id'    => 59,
                'title' => 'driver_delete',
            ],
            [
                'id'    => 60,
                'title' => 'driver_access',
            ],
            [
                'id'    => 61,
                'title' => 'adr_create',
            ],
            [
                'id'    => 62,
                'title' => 'adr_edit',
            ],
            [
                'id'    => 63,
                'title' => 'adr_show',
            ],
            [
                'id'    => 64,
                'title' => 'adr_delete',
            ],
            [
                'id'    => 65,
                'title' => 'adr_access',
            ],
            [
                'id'    => 66,
                'title' => 'typeload_create',
            ],
            [
                'id'    => 67,
                'title' => 'typeload_edit',
            ],
            [
                'id'    => 68,
                'title' => 'typeload_show',
            ],
            [
                'id'    => 69,
                'title' => 'typeload_delete',
            ],
            [
                'id'    => 70,
                'title' => 'typeload_access',
            ],
            [
                'id'    => 71,
                'title' => 'auto_create',
            ],
            [
                'id'    => 72,
                'title' => 'auto_edit',
            ],
            [
                'id'    => 73,
                'title' => 'auto_show',
            ],
            [
                'id'    => 74,
                'title' => 'auto_delete',
            ],
            [
                'id'    => 75,
                'title' => 'auto_access',
            ],
            [
                'id'    => 76,
                'title' => 'holiday_create',
            ],
            [
                'id'    => 77,
                'title' => 'holiday_edit',
            ],
            [
                'id'    => 78,
                'title' => 'holiday_show',
            ],
            [
                'id'    => 79,
                'title' => 'holiday_delete',
            ],
            [
                'id'    => 80,
                'title' => 'holiday_access',
            ],
            [
                'id'    => 81,
                'title' => 'perevozklient_create',
            ],
            [
                'id'    => 82,
                'title' => 'perevozklient_edit',
            ],
            [
                'id'    => 83,
                'title' => 'perevozklient_show',
            ],
            [
                'id'    => 84,
                'title' => 'perevozklient_delete',
            ],
            [
                'id'    => 85,
                'title' => 'perevozklient_access',
            ],
            [
                'id'    => 86,
                'title' => 'zakazchikklient_create',
            ],
            [
                'id'    => 87,
                'title' => 'zakazchikklient_edit',
            ],
            [
                'id'    => 88,
                'title' => 'zakazchikklient_show',
            ],
            [
                'id'    => 89,
                'title' => 'zakazchikklient_delete',
            ],
            [
                'id'    => 90,
                'title' => 'zakazchikklient_access',
            ],
            [
                'id'    => 91,
                'title' => 'pointload_create',
            ],
            [
                'id'    => 92,
                'title' => 'pointload_edit',
            ],
            [
                'id'    => 93,
                'title' => 'pointload_show',
            ],
            [
                'id'    => 94,
                'title' => 'pointload_delete',
            ],
            [
                'id'    => 95,
                'title' => 'pointload_access',
            ],
            [
                'id'    => 96,
                'title' => 'birga_access',
            ],
            [
                'id'    => 97,
                'title' => 'gruz_create',
            ],
            [
                'id'    => 98,
                'title' => 'gruz_edit',
            ],
            [
                'id'    => 99,
                'title' => 'gruz_show',
            ],
            [
                'id'    => 100,
                'title' => 'gruz_delete',
            ],
            [
                'id'    => 101,
                'title' => 'gruz_access',
            ],
            [
                'id'    => 102,
                'title' => 'titilegruz_create',
            ],
            [
                'id'    => 103,
                'title' => 'titilegruz_edit',
            ],
            [
                'id'    => 104,
                'title' => 'titilegruz_show',
            ],
            [
                'id'    => 105,
                'title' => 'titilegruz_delete',
            ],
            [
                'id'    => 106,
                'title' => 'titilegruz_access',
            ],
            [
                'id'    => 107,
                'title' => 'unitma_create',
            ],
            [
                'id'    => 108,
                'title' => 'unitma_edit',
            ],
            [
                'id'    => 109,
                'title' => 'unitma_show',
            ],
            [
                'id'    => 110,
                'title' => 'unitma_delete',
            ],
            [
                'id'    => 111,
                'title' => 'unitma_access',
            ],
            [
                'id'    => 112,
                'title' => 'typekuzova_create',
            ],
            [
                'id'    => 113,
                'title' => 'typekuzova_edit',
            ],
            [
                'id'    => 114,
                'title' => 'typekuzova_show',
            ],
            [
                'id'    => 115,
                'title' => 'typekuzova_delete',
            ],
            [
                'id'    => 116,
                'title' => 'typekuzova_access',
            ],
            [
                'id'    => 117,
                'title' => 'typeunload_create',
            ],
            [
                'id'    => 118,
                'title' => 'typeunload_edit',
            ],
            [
                'id'    => 119,
                'title' => 'typeunload_show',
            ],
            [
                'id'    => 120,
                'title' => 'typeunload_delete',
            ],
            [
                'id'    => 121,
                'title' => 'typeunload_access',
            ],
            [
                'id'    => 122,
                'title' => 'ltlftl_create',
            ],
            [
                'id'    => 123,
                'title' => 'ltlftl_edit',
            ],
            [
                'id'    => 124,
                'title' => 'ltlftl_show',
            ],
            [
                'id'    => 125,
                'title' => 'ltlftl_delete',
            ],
            [
                'id'    => 126,
                'title' => 'ltlftl_access',
            ],
            [
                'id'    => 127,
                'title' => 'trebovan_create',
            ],
            [
                'id'    => 128,
                'title' => 'trebovan_edit',
            ],
            [
                'id'    => 129,
                'title' => 'trebovan_show',
            ],
            [
                'id'    => 130,
                'title' => 'trebovan_delete',
            ],
            [
                'id'    => 131,
                'title' => 'trebovan_access',
            ],
            [
                'id'    => 132,
                'title' => 'trandoc_create',
            ],
            [
                'id'    => 133,
                'title' => 'trandoc_edit',
            ],
            [
                'id'    => 134,
                'title' => 'trandoc_show',
            ],
            [
                'id'    => 135,
                'title' => 'trandoc_delete',
            ],
            [
                'id'    => 136,
                'title' => 'trandoc_access',
            ],
            [
                'id'    => 137,
                'title' => 'valutand_create',
            ],
            [
                'id'    => 138,
                'title' => 'valutand_edit',
            ],
            [
                'id'    => 139,
                'title' => 'valutand_show',
            ],
            [
                'id'    => 140,
                'title' => 'valutand_delete',
            ],
            [
                'id'    => 141,
                'title' => 'valutand_access',
            ],
            [
                'id'    => 142,
                'title' => 'zakazhik_perevoz_create',
            ],
            [
                'id'    => 143,
                'title' => 'zakazhik_perevoz_edit',
            ],
            [
                'id'    => 144,
                'title' => 'zakazhik_perevoz_show',
            ],
            [
                'id'    => 145,
                'title' => 'zakazhik_perevoz_delete',
            ],
            [
                'id'    => 146,
                'title' => 'zakazhik_perevoz_access',
            ],
            [
                'id'    => 147,
                'title' => 'zakazgrup_create',
            ],
            [
                'id'    => 148,
                'title' => 'zakazgrup_edit',
            ],
            [
                'id'    => 149,
                'title' => 'zakazgrup_show',
            ],
            [
                'id'    => 150,
                'title' => 'zakazgrup_delete',
            ],
            [
                'id'    => 151,
                'title' => 'zakazgrup_access',
            ],
            [
                'id'    => 152,
                'title' => 'perevoz_exp_create',
            ],
            [
                'id'    => 153,
                'title' => 'perevoz_exp_edit',
            ],
            [
                'id'    => 154,
                'title' => 'perevoz_exp_show',
            ],
            [
                'id'    => 155,
                'title' => 'perevoz_exp_delete',
            ],
            [
                'id'    => 156,
                'title' => 'perevoz_exp_access',
            ],
            [
                'id'    => 157,
                'title' => 'perevozchik_perevoz_create',
            ],
            [
                'id'    => 158,
                'title' => 'perevozchik_perevoz_edit',
            ],
            [
                'id'    => 159,
                'title' => 'perevozchik_perevoz_show',
            ],
            [
                'id'    => 160,
                'title' => 'perevozchik_perevoz_delete',
            ],
            [
                'id'    => 161,
                'title' => 'perevozchik_perevoz_access',
            ],
            [
                'id'    => 162,
                'title' => 'zakaznagruz_create',
            ],
            [
                'id'    => 163,
                'title' => 'zakaznagruz_edit',
            ],
            [
                'id'    => 164,
                'title' => 'zakaznagruz_show',
            ],
            [
                'id'    => 165,
                'title' => 'zakaznagruz_delete',
            ],
            [
                'id'    => 166,
                'title' => 'zakaznagruz_access',
            ],
            [
                'id'    => 167,
                'title' => 'nazna_access',
            ],
            [
                'id'    => 168,
                'title' => 'offer_create',
            ],
            [
                'id'    => 169,
                'title' => 'offer_edit',
            ],
            [
                'id'    => 170,
                'title' => 'offer_show',
            ],
            [
                'id'    => 171,
                'title' => 'offer_delete',
            ],
            [
                'id'    => 172,
                'title' => 'offer_access',
            ],
            [
                'id'    => 173,
                'title' => 'nooffer_create',
            ],
            [
                'id'    => 174,
                'title' => 'nooffer_edit',
            ],
            [
                'id'    => 175,
                'title' => 'nooffer_show',
            ],
            [
                'id'    => 176,
                'title' => 'nooffer_delete',
            ],
            [
                'id'    => 177,
                'title' => 'nooffer_access',
            ],
            [
                'id'    => 178,
                'title' => 'naznapere_create',
            ],
            [
                'id'    => 179,
                'title' => 'naznapere_edit',
            ],
            [
                'id'    => 180,
                'title' => 'naznapere_show',
            ],
            [
                'id'    => 181,
                'title' => 'naznapere_delete',
            ],
            [
                'id'    => 182,
                'title' => 'naznapere_access',
            ],
            [
                'id'    => 183,
                'title' => 'naznaotm_create',
            ],
            [
                'id'    => 184,
                'title' => 'naznaotm_edit',
            ],
            [
                'id'    => 185,
                'title' => 'naznaotm_show',
            ],
            [
                'id'    => 186,
                'title' => 'naznaotm_delete',
            ],
            [
                'id'    => 187,
                'title' => 'naznaotm_access',
            ],
            [
                'id'    => 188,
                'title' => 'upravlenie_create',
            ],
            [
                'id'    => 189,
                'title' => 'upravlenie_edit',
            ],
            [
                'id'    => 190,
                'title' => 'upravlenie_show',
            ],
            [
                'id'    => 191,
                'title' => 'upravlenie_delete',
            ],
            [
                'id'    => 192,
                'title' => 'upravlenie_access',
            ],
            [
                'id'    => 193,
                'title' => 'valutum_create',
            ],
            [
                'id'    => 194,
                'title' => 'valutum_edit',
            ],
            [
                'id'    => 195,
                'title' => 'valutum_show',
            ],
            [
                'id'    => 196,
                'title' => 'valutum_delete',
            ],
            [
                'id'    => 197,
                'title' => 'valutum_access',
            ],
            [
                'id'    => 198,
                'title' => 'typeolpatum_create',
            ],
            [
                'id'    => 199,
                'title' => 'typeolpatum_edit',
            ],
            [
                'id'    => 200,
                'title' => 'typeolpatum_show',
            ],
            [
                'id'    => 201,
                'title' => 'typeolpatum_delete',
            ],
            [
                'id'    => 202,
                'title' => 'typeolpatum_access',
            ],
            [
                'id'    => 203,
                'title' => 'autotypload_create',
            ],
            [
                'id'    => 204,
                'title' => 'autotypload_edit',
            ],
            [
                'id'    => 205,
                'title' => 'autotypload_show',
            ],
            [
                'id'    => 206,
                'title' => 'autotypload_delete',
            ],
            [
                'id'    => 207,
                'title' => 'autotypload_access',
            ],
            [
                'id'    => 208,
                'title' => 'autobirga_create',
            ],
            [
                'id'    => 209,
                'title' => 'autobirga_edit',
            ],
            [
                'id'    => 210,
                'title' => 'autobirga_show',
            ],
            [
                'id'    => 211,
                'title' => 'autobirga_delete',
            ],
            [
                'id'    => 212,
                'title' => 'autobirga_access',
            ],
            [
                'id'    => 213,
                'title' => 'custom_create',
            ],
            [
                'id'    => 214,
                'title' => 'custom_edit',
            ],
            [
                'id'    => 215,
                'title' => 'custom_show',
            ],
            [
                'id'    => 216,
                'title' => 'custom_delete',
            ],
            [
                'id'    => 217,
                'title' => 'custom_access',
            ],
            [
                'id'    => 218,
                'title' => 'marka_create',
            ],
            [
                'id'    => 219,
                'title' => 'marka_edit',
            ],
            [
                'id'    => 220,
                'title' => 'marka_show',
            ],
            [
                'id'    => 221,
                'title' => 'marka_delete',
            ],
            [
                'id'    => 222,
                'title' => 'marka_access',
            ],
            [
                'id'    => 223,
                'title' => 'rolecomp_create',
            ],
            [
                'id'    => 224,
                'title' => 'rolecomp_edit',
            ],
            [
                'id'    => 225,
                'title' => 'rolecomp_show',
            ],
            [
                'id'    => 226,
                'title' => 'rolecomp_delete',
            ],
            [
                'id'    => 227,
                'title' => 'rolecomp_access',
            ],
            [
                'id'    => 228,
                'title' => 'typeloaddest_create',
            ],
            [
                'id'    => 229,
                'title' => 'typeloaddest_edit',
            ],
            [
                'id'    => 230,
                'title' => 'typeloaddest_show',
            ],
            [
                'id'    => 231,
                'title' => 'typeloaddest_delete',
            ],
            [
                'id'    => 232,
                'title' => 'typeloaddest_access',
            ],
            [
                'id'    => 233,
                'title' => 'catware_create',
            ],
            [
                'id'    => 234,
                'title' => 'catware_edit',
            ],
            [
                'id'    => 235,
                'title' => 'catware_show',
            ],
            [
                'id'    => 236,
                'title' => 'catware_delete',
            ],
            [
                'id'    => 237,
                'title' => 'catware_access',
            ],
            [
                'id'    => 238,
                'title' => 'typeloadunload_create',
            ],
            [
                'id'    => 239,
                'title' => 'typeloadunload_edit',
            ],
            [
                'id'    => 240,
                'title' => 'typeloadunload_show',
            ],
            [
                'id'    => 241,
                'title' => 'typeloadunload_delete',
            ],
            [
                'id'    => 242,
                'title' => 'typeloadunload_access',
            ],
            [
                'id'    => 243,
                'title' => 'sourcegood_create',
            ],
            [
                'id'    => 244,
                'title' => 'sourcegood_edit',
            ],
            [
                'id'    => 245,
                'title' => 'sourcegood_show',
            ],
            [
                'id'    => 246,
                'title' => 'sourcegood_delete',
            ],
            [
                'id'    => 247,
                'title' => 'sourcegood_access',
            ],
            [
                'id'    => 248,
                'title' => 'logistgroup_create',
            ],
            [
                'id'    => 249,
                'title' => 'logistgroup_edit',
            ],
            [
                'id'    => 250,
                'title' => 'logistgroup_show',
            ],
            [
                'id'    => 251,
                'title' => 'logistgroup_delete',
            ],
            [
                'id'    => 252,
                'title' => 'logistgroup_access',
            ],
            [
                'id'    => 253,
                'title' => 'filial_create',
            ],
            [
                'id'    => 254,
                'title' => 'filial_edit',
            ],
            [
                'id'    => 255,
                'title' => 'filial_show',
            ],
            [
                'id'    => 256,
                'title' => 'filial_delete',
            ],
            [
                'id'    => 257,
                'title' => 'filial_access',
            ],
            [
                'id'    => 258,
                'title' => 'city_create',
            ],
            [
                'id'    => 259,
                'title' => 'city_edit',
            ],
            [
                'id'    => 260,
                'title' => 'city_show',
            ],
            [
                'id'    => 261,
                'title' => 'city_delete',
            ],
            [
                'id'    => 262,
                'title' => 'city_access',
            ],
            [
                'id'    => 263,
                'title' => 'typeloaddestination_create',
            ],
            [
                'id'    => 264,
                'title' => 'typeloaddestination_edit',
            ],
            [
                'id'    => 265,
                'title' => 'typeloaddestination_show',
            ],
            [
                'id'    => 266,
                'title' => 'typeloaddestination_delete',
            ],
            [
                'id'    => 267,
                'title' => 'typeloaddestination_access',
            ],
            [
                'id'    => 268,
                'title' => 'typestatus_create',
            ],
            [
                'id'    => 269,
                'title' => 'typestatus_edit',
            ],
            [
                'id'    => 270,
                'title' => 'typestatus_show',
            ],
            [
                'id'    => 271,
                'title' => 'typestatus_delete',
            ],
            [
                'id'    => 272,
                'title' => 'typestatus_access',
            ],
            [
                'id'    => 273,
                'title' => 'statuszaya_create',
            ],
            [
                'id'    => 274,
                'title' => 'statuszaya_edit',
            ],
            [
                'id'    => 275,
                'title' => 'statuszaya_show',
            ],
            [
                'id'    => 276,
                'title' => 'statuszaya_delete',
            ],
            [
                'id'    => 277,
                'title' => 'statuszaya_access',
            ],
            [
                'id'    => 278,
                'title' => 'lastevent_create',
            ],
            [
                'id'    => 279,
                'title' => 'lastevent_edit',
            ],
            [
                'id'    => 280,
                'title' => 'lastevent_show',
            ],
            [
                'id'    => 281,
                'title' => 'lastevent_delete',
            ],
            [
                'id'    => 282,
                'title' => 'lastevent_access',
            ],
            [
                'id'    => 283,
                'title' => 'filialmain_create',
            ],
            [
                'id'    => 284,
                'title' => 'filialmain_edit',
            ],
            [
                'id'    => 285,
                'title' => 'filialmain_show',
            ],
            [
                'id'    => 286,
                'title' => 'filialmain_delete',
            ],
            [
                'id'    => 287,
                'title' => 'filialmain_access',
            ],
            [
                'id'    => 288,
                'title' => 'dopeq_create',
            ],
            [
                'id'    => 289,
                'title' => 'dopeq_edit',
            ],
            [
                'id'    => 290,
                'title' => 'dopeq_show',
            ],
            [
                'id'    => 291,
                'title' => 'dopeq_delete',
            ],
            [
                'id'    => 292,
                'title' => 'dopeq_access',
            ],
            [
                'id'    => 293,
                'title' => 'other_create',
            ],
            [
                'id'    => 294,
                'title' => 'other_edit',
            ],
            [
                'id'    => 295,
                'title' => 'other_show',
            ],
            [
                'id'    => 296,
                'title' => 'other_delete',
            ],
            [
                'id'    => 297,
                'title' => 'other_access',
            ],
            [
                'id'    => 298,
                'title' => 'condtorg_create',
            ],
            [
                'id'    => 299,
                'title' => 'condtorg_edit',
            ],
            [
                'id'    => 300,
                'title' => 'condtorg_show',
            ],
            [
                'id'    => 301,
                'title' => 'condtorg_delete',
            ],
            [
                'id'    => 302,
                'title' => 'condtorg_access',
            ],
            [
                'id'    => 303,
                'title' => 'typepack_create',
            ],
            [
                'id'    => 304,
                'title' => 'typepack_edit',
            ],
            [
                'id'    => 305,
                'title' => 'typepack_show',
            ],
            [
                'id'    => 306,
                'title' => 'typepack_delete',
            ],
            [
                'id'    => 307,
                'title' => 'typepack_access',
            ],
            [
                'id'    => 308,
                'title' => 'condpay_create',
            ],
            [
                'id'    => 309,
                'title' => 'condpay_edit',
            ],
            [
                'id'    => 310,
                'title' => 'condpay_show',
            ],
            [
                'id'    => 311,
                'title' => 'condpay_delete',
            ],
            [
                'id'    => 312,
                'title' => 'condpay_access',
            ],
            [
                'id'    => 313,
                'title' => 'monitorng_create',
            ],
            [
                'id'    => 314,
                'title' => 'monitorng_edit',
            ],
            [
                'id'    => 315,
                'title' => 'monitorng_show',
            ],
            [
                'id'    => 316,
                'title' => 'monitorng_delete',
            ],
            [
                'id'    => 317,
                'title' => 'monitorng_access',
            ],
            [
                'id'    => 318,
                'title' => 'product_create',
            ],
            [
                'id'    => 319,
                'title' => 'product_edit',
            ],
            [
                'id'    => 320,
                'title' => 'product_show',
            ],
            [
                'id'    => 321,
                'title' => 'product_delete',
            ],
            [
                'id'    => 322,
                'title' => 'product_access',
            ],
            [
                'id'    => 323,
                'title' => 'tm_access',
            ],
            [
                'id'    => 324,
                'title' => 'type_palet_create',
            ],
            [
                'id'    => 325,
                'title' => 'type_palet_edit',
            ],
            [
                'id'    => 326,
                'title' => 'type_palet_show',
            ],
            [
                'id'    => 327,
                'title' => 'type_palet_delete',
            ],
            [
                'id'    => 328,
                'title' => 'type_palet_access',
            ],
            [
                'id'    => 329,
                'title' => 'listproduct_create',
            ],
            [
                'id'    => 330,
                'title' => 'listproduct_edit',
            ],
            [
                'id'    => 331,
                'title' => 'listproduct_show',
            ],
            [
                'id'    => 332,
                'title' => 'listproduct_delete',
            ],
            [
                'id'    => 333,
                'title' => 'listproduct_access',
            ],
            [
                'id'    => 334,
                'title' => 'doc_ttn_create',
            ],
            [
                'id'    => 335,
                'title' => 'doc_ttn_edit',
            ],
            [
                'id'    => 336,
                'title' => 'doc_ttn_show',
            ],
            [
                'id'    => 337,
                'title' => 'doc_ttn_delete',
            ],
            [
                'id'    => 338,
                'title' => 'doc_ttn_access',
            ],
            [
                'id'    => 339,
                'title' => 'favouritel_create',
            ],
            [
                'id'    => 340,
                'title' => 'favouritel_edit',
            ],
            [
                'id'    => 341,
                'title' => 'favouritel_show',
            ],
            [
                'id'    => 342,
                'title' => 'favouritel_delete',
            ],
            [
                'id'    => 343,
                'title' => 'favouritel_access',
            ],
            [
                'id'    => 344,
                'title' => 'favouritea_create',
            ],
            [
                'id'    => 345,
                'title' => 'favouritea_edit',
            ],
            [
                'id'    => 346,
                'title' => 'favouritea_show',
            ],
            [
                'id'    => 347,
                'title' => 'favouritea_delete',
            ],
            [
                'id'    => 348,
                'title' => 'favouritea_access',
            ],
            [
                'id'    => 349,
                'title' => 'draft_create',
            ],
            [
                'id'    => 350,
                'title' => 'draft_edit',
            ],
            [
                'id'    => 351,
                'title' => 'draft_show',
            ],
            [
                'id'    => 352,
                'title' => 'draft_delete',
            ],
            [
                'id'    => 353,
                'title' => 'draft_access',
            ],
            [
                'id'    => 354,
                'title' => 'draftum_create',
            ],
            [
                'id'    => 355,
                'title' => 'draftum_edit',
            ],
            [
                'id'    => 356,
                'title' => 'draftum_show',
            ],
            [
                'id'    => 357,
                'title' => 'draftum_delete',
            ],
            [
                'id'    => 358,
                'title' => 'draftum_access',
            ],
            [
                'id'    => 359,
                'title' => 'archive_create',
            ],
            [
                'id'    => 360,
                'title' => 'archive_edit',
            ],
            [
                'id'    => 361,
                'title' => 'archive_show',
            ],
            [
                'id'    => 362,
                'title' => 'archive_delete',
            ],
            [
                'id'    => 363,
                'title' => 'archive_access',
            ],
            [
                'id'    => 364,
                'title' => 'archivea_create',
            ],
            [
                'id'    => 365,
                'title' => 'archivea_edit',
            ],
            [
                'id'    => 366,
                'title' => 'archivea_show',
            ],
            [
                'id'    => 367,
                'title' => 'archivea_delete',
            ],
            [
                'id'    => 368,
                'title' => 'archivea_access',
            ],
            [
                'id'    => 369,
                'title' => 'my_create',
            ],
            [
                'id'    => 370,
                'title' => 'my_edit',
            ],
            [
                'id'    => 371,
                'title' => 'my_show',
            ],
            [
                'id'    => 372,
                'title' => 'my_delete',
            ],
            [
                'id'    => 373,
                'title' => 'my_access',
            ],
            [
                'id'    => 374,
                'title' => 'mya_create',
            ],
            [
                'id'    => 375,
                'title' => 'mya_edit',
            ],
            [
                'id'    => 376,
                'title' => 'mya_show',
            ],
            [
                'id'    => 377,
                'title' => 'mya_delete',
            ],
            [
                'id'    => 378,
                'title' => 'mya_access',
            ],
            [
                'id'    => 379,
                'title' => 'offerg_create',
            ],
            [
                'id'    => 380,
                'title' => 'offerg_edit',
            ],
            [
                'id'    => 381,
                'title' => 'offerg_show',
            ],
            [
                'id'    => 382,
                'title' => 'offerg_delete',
            ],
            [
                'id'    => 383,
                'title' => 'offerg_access',
            ],
            [
                'id'    => 384,
                'title' => 'offera_create',
            ],
            [
                'id'    => 385,
                'title' => 'offera_edit',
            ],
            [
                'id'    => 386,
                'title' => 'offera_show',
            ],
            [
                'id'    => 387,
                'title' => 'offera_delete',
            ],
            [
                'id'    => 388,
                'title' => 'offera_access',
            ],
            [
                'id'    => 389,
                'title' => 'partner_access',
            ],
            [
                'id'    => 390,
                'title' => 'partnerz_create',
            ],
            [
                'id'    => 391,
                'title' => 'partnerz_edit',
            ],
            [
                'id'    => 392,
                'title' => 'partnerz_show',
            ],
            [
                'id'    => 393,
                'title' => 'partnerz_delete',
            ],
            [
                'id'    => 394,
                'title' => 'partnerz_access',
            ],
            [
                'id'    => 395,
                'title' => 'partnerp_create',
            ],
            [
                'id'    => 396,
                'title' => 'partnerp_edit',
            ],
            [
                'id'    => 397,
                'title' => 'partnerp_show',
            ],
            [
                'id'    => 398,
                'title' => 'partnerp_delete',
            ],
            [
                'id'    => 399,
                'title' => 'partnerp_access',
            ],
            [
                'id'    => 400,
                'title' => 'partnerm_create',
            ],
            [
                'id'    => 401,
                'title' => 'partnerm_edit',
            ],
            [
                'id'    => 402,
                'title' => 'partnerm_show',
            ],
            [
                'id'    => 403,
                'title' => 'partnerm_delete',
            ],
            [
                'id'    => 404,
                'title' => 'partnerm_access',
            ],
            [
                'id'    => 405,
                'title' => 'partneri_create',
            ],
            [
                'id'    => 406,
                'title' => 'partneri_edit',
            ],
            [
                'id'    => 407,
                'title' => 'partneri_show',
            ],
            [
                'id'    => 408,
                'title' => 'partneri_delete',
            ],
            [
                'id'    => 409,
                'title' => 'partneri_access',
            ],
            [
                'id'    => 410,
                'title' => 'partnerb_create',
            ],
            [
                'id'    => 411,
                'title' => 'partnerb_edit',
            ],
            [
                'id'    => 412,
                'title' => 'partnerb_show',
            ],
            [
                'id'    => 413,
                'title' => 'partnerb_delete',
            ],
            [
                'id'    => 414,
                'title' => 'partnerb_access',
            ],
            [
                'id'    => 415,
                'title' => 'companyinfo_create',
            ],
            [
                'id'    => 416,
                'title' => 'companyinfo_edit',
            ],
            [
                'id'    => 417,
                'title' => 'companyinfo_show',
            ],
            [
                'id'    => 418,
                'title' => 'companyinfo_delete',
            ],
            [
                'id'    => 419,
                'title' => 'companyinfo_access',
            ],
            [
                'id'    => 420,
                'title' => 'tender_access',
            ],
            [
                'id'    => 421,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
