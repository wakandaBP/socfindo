USE [TCKARET]
GO
/****** Object:  Table [dbo].[app_roles]    Script Date: 19/04/2020 11:07:57 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[app_roles](
	[id] [int] IDENTITY(2,1) NOT NULL,
	[name] [nvarchar](30) NOT NULL,
	[role] [nvarchar](20) NOT NULL,
 CONSTRAINT [PK_app_roles_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[app_users]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[app_users](
	[id] [int] IDENTITY(2,1) NOT NULL,
	[username] [nvarchar](25) NOT NULL,
	[password] [nvarchar](64) NOT NULL,
	[email] [nvarchar](255) NOT NULL,
	[is_active] [bit] NOT NULL,
 CONSTRAINT [PK_app_users_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[karet_clone]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_clone](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[clonename] [nvarchar](15) NOT NULL,
	[description] [varchar](max) NULL,
	[isactive] [nvarchar](2) NOT NULL,
 CONSTRAINT [PK__karet_cl__3213E83FE3517614] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[karet_contamination]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[karet_contamination](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[species] [nvarchar](255) NOT NULL,
	[deactive] [nvarchar](1) NOT NULL,
	[isactive] [nvarchar](1) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[karet_contamination_record]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[karet_contamination_record](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_treatment] [int] NULL,
	[contamination_fungi] [int] NULL,
	[contamination_bact] [int] NULL,
	[pink] [int] NULL,
	[dead] [int] NULL,
	[comments] [text] NULL,
	[isactive] [int] NOT NULL,
	[reju_step] [int] NULL,
	[id_embryo] [int] NULL,
 CONSTRAINT [PK_karet_contamination_record] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[karet_embryo]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[karet_embryo](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_treatment] [int] NOT NULL,
	[isactive] [int] NOT NULL,
	[id_initiation_trans] [int] NULL,
 CONSTRAINT [PK_karet_embryo] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[karet_embryo_germination]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_embryo_germination](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_embryo] [int] NOT NULL,
	[transferdate] [date] NOT NULL,
	[germ_worker] [int] NOT NULL,
	[idmedia] [int] NOT NULL,
	[laminar] [int] NOT NULL,
	[cultureroom] [varchar](20) NOT NULL,
	[nobox] [varchar](10) NOT NULL,
	[comment] [text] NULL,
	[is_available] [int] NOT NULL,
	[isactive] [int] NOT NULL,
	[connected_to_other] [varchar](5) NULL,
	[shape_of_embryo] [varchar](20) NULL,
	[size_of_embryo] [varchar](1) NULL,
	[comment_embryo] [text] NULL,
	[type_of_callus] [varchar](10) NULL,
	[color_of_callus] [varchar](15) NULL,
	[comment_callus] [text] NULL,
	[idpengeluaranmedia] [int] NULL,
 CONSTRAINT [PK_karet_embryo_germination] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[karet_embryo_germination_prepare]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_embryo_germination_prepare](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_embryo] [int] NOT NULL,
	[germ_date] [date] NOT NULL,
	[shoot] [varchar](5) NOT NULL,
	[germinated] [varchar](3) NOT NULL,
	[comment] [text] NULL,
	[isactive] [int] NOT NULL,
	[is_available] [int] NOT NULL,
	[germ_worker] [int] NULL,
	[idmedia] [int] NULL,
	[idpengeluaranmedia] [int] NULL,
 CONSTRAINT [PK_karet_embryo_germination_prepare] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[karet_embryo_germination_prepare_screening]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[karet_embryo_germination_prepare_screening](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_embryo] [int] NOT NULL,
	[screening_date] [date] NOT NULL,
	[screening_worker] [int] NOT NULL,
	[screening_checkpoint] [int] NOT NULL,
	[comment] [text] NULL,
	[idcontaminationrecord] [int] NOT NULL,
	[isactive] [int] NOT NULL,
 CONSTRAINT [PK_karet_embryo_germination_prepare_screening] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[karet_embryo_germination_screening]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[karet_embryo_germination_screening](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_embryo] [int] NOT NULL,
	[screening_date] [date] NOT NULL,
	[screening_checkpoint] [int] NOT NULL,
	[comment] [text] NULL,
	[isactive] [int] NOT NULL,
	[idcontaminationrecord] [int] NOT NULL,
	[screening_worker] [int] NOT NULL,
 CONSTRAINT [PK_karet_embryo_germination_screening] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[karet_embryo_maturation_1]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_embryo_maturation_1](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_embryo] [int] NOT NULL,
	[transferdate] [date] NOT NULL,
	[maturation_worker] [int] NOT NULL,
	[idmedia] [int] NOT NULL,
	[laminar] [int] NOT NULL,
	[isactive] [int] NOT NULL,
	[cultureroom] [varchar](20) NULL,
	[nobox] [varchar](10) NULL,
	[is_available] [int] NULL,
	[comment] [text] NULL,
	[idpengeluaranmedia] [int] NULL,
 CONSTRAINT [PK_karet_maturation_1] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[karet_embryo_maturation_2]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_embryo_maturation_2](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_embryo] [int] NOT NULL,
	[transferdate] [date] NOT NULL,
	[maturation2_worker] [int] NOT NULL,
	[laminar] [int] NOT NULL,
	[isactive] [int] NOT NULL,
	[idmedia] [int] NULL,
	[cultureroom] [varchar](20) NULL,
	[nobox] [varchar](10) NULL,
	[is_available] [int] NULL,
	[comment] [text] NULL,
	[idpengeluaranmedia] [int] NULL,
 CONSTRAINT [PK_karet_maturation] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[karet_embryo_maturation1_screening]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[karet_embryo_maturation1_screening](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_embryo] [int] NOT NULL,
	[screening_date] [date] NOT NULL,
	[screening_checkpoint] [int] NOT NULL,
	[comment] [text] NULL,
	[isactive] [int] NOT NULL,
	[idcontaminationrecord] [int] NOT NULL,
	[screening_worker] [int] NULL,
 CONSTRAINT [PK_karet_embryo_maturation1_screening] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[karet_embryo_maturation2_screening]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[karet_embryo_maturation2_screening](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_embryo] [int] NOT NULL,
	[screening_date] [date] NOT NULL,
	[screening_checkpoint] [int] NOT NULL,
	[screening_worker] [int] NOT NULL,
	[isactive] [int] NOT NULL,
	[idcontaminationrecord] [int] NOT NULL,
	[comment] [text] NULL,
 CONSTRAINT [PK_karet_embryo_maturation2_screening] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[karet_initiation]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_initiation](
	[id_treatment] [int] IDENTITY(1,1) NOT NULL,
	[id_reception] [int] NOT NULL,
	[nobox] [int] NULL,
	[sample] [nvarchar](10) NOT NULL,
	[initiation_date] [date] NOT NULL,
	[widthseed] [decimal](18, 0) NULL,
	[numberofseeds] [int] NULL,
	[seedcomments] [text] NULL,
	[se] [int] NULL,
	[ze] [int] NULL,
	[initiation_worker] [int] NOT NULL,
	[laminar] [int] NOT NULL,
	[isactive] [nvarchar](2) NOT NULL,
	[treatmentcomment] [text] NULL,
	[remaining_sample] [int] NULL,
	[barcode] [varchar](100) NULL,
	[remaining_petri] [int] NULL,
	[idmedia] [int] NULL,
	[idpengeluaranmedia] [int] NULL,
 CONSTRAINT [PK_karet_initiation] PRIMARY KEY CLUSTERED 
(
	[id_treatment] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[karet_initiation_embryo_grow]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[karet_initiation_embryo_grow](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_initiation_trans] [int] NOT NULL,
	[id_treatment] [int] NOT NULL,
	[growing_embryo] [int] NOT NULL,
	[remaining_embryo] [int] NOT NULL,
	[isactive] [int] NOT NULL,
 CONSTRAINT [PK_karet_initiation_embryo_grow] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[karet_initiation_embryo_screening]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[karet_initiation_embryo_screening](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_treatment] [int] NOT NULL,
	[screening_date] [date] NOT NULL,
	[screening_worker] [int] NOT NULL,
	[isactive] [int] NOT NULL,
	[grow_embryo] [int] NULL,
	[screening_checkpoint] [int] NULL,
	[comment] [text] NULL,
	[idcontaminationrecord] [int] NULL,
	[id_initiation_trans] [int] NULL,
 CONSTRAINT [PK_karet_embryo_screening] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[karet_initiation_embryo_total]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[karet_initiation_embryo_total](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_treatment] [int] NOT NULL,
	[totalembryo] [int] NULL,
	[embryoperexplant] [decimal](10, 2) NULL,
	[isactive] [int] NOT NULL,
 CONSTRAINT [PK_karet_embryo_total] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[karet_initiation_obs]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[karet_initiation_obs](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_treatment] [int] NOT NULL,
	[obsdate] [date] NOT NULL,
	[obsworker] [int] NOT NULL,
	[alotofcallus] [int] NULL,
	[littlebitofcallus] [int] NULL,
	[yellow] [int] NULL,
	[white] [int] NULL,
	[orange] [int] NULL,
	[brown] [int] NULL,
	[dead] [int] NULL,
	[piecesnotreact] [int] NULL,
	[isactive] [int] NULL,
	[idcontaminationrecord] [int] NULL,
	[isavailable] [int] NULL,
 CONSTRAINT [PK_karet_obscallus] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[karet_initiation_trans]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_initiation_trans](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_treatment] [int] NOT NULL,
	[callustransfer] [int] NOT NULL,
	[transferdate] [date] NOT NULL,
	[transferworker] [int] NOT NULL,
	[comment] [text] NULL,
	[isactive] [int] NOT NULL,
	[barcode] [varchar](100) NULL,
	[isavailable] [int] NULL,
	[laminar] [int] NULL,
	[idmedia] [int] NULL,
	[idpengeluaranmedia] [int] NULL,
 CONSTRAINT [PK_karet_initiation_trans] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[karet_laminar]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_laminar](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nolaminar] [nvarchar](50) NOT NULL,
	[cleaningdate] [date] NOT NULL,
	[datetoclean] [date] NOT NULL,
	[isactive] [nvarchar](2) NOT NULL,
	[description] [varchar](max) NULL,
 CONSTRAINT [PK__karet_la__3213E83F695C1902] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[karet_media]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_media](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[mediacode] [nvarchar](15) NOT NULL,
	[description] [varchar](max) NULL,
	[stok] [int] NULL,
	[isactive] [nvarchar](2) NOT NULL,
	[id_jenis_media] [int] NULL,
	[id_media_type] [int] NULL,
 CONSTRAINT [PK__karet_me__3213E83FB17119BC] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[karet_media_pembuatan]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_media_pembuatan](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[idmedia] [int] NOT NULL,
	[tglpembuatanmedia] [date] NOT NULL,
	[idworker] [int] NOT NULL,
	[volume] [float] NOT NULL,
	[idvessel] [int] NOT NULL,
	[jumlah] [int] NOT NULL,
	[isactive] [nvarchar](2) NOT NULL,
	[remaining_media] [int] NULL,
	[is_expired] [int] NULL,
	[barcode] [varchar](20) NULL,
	[is_remove] [int] NULL,
	[lamakerja] [varchar](8) NULL,
 CONSTRAINT [PK__karet_pe__3213E83FA2F678B6] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[karet_media_pengeluaran]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_media_pengeluaran](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[jumlah_keluar] [int] NOT NULL,
	[reju_step] [int] NOT NULL,
	[isactive] [int] NOT NULL,
	[id_treatment] [int] NULL,
	[id_media] [int] NULL,
	[tglkeluar] [datetime] NULL,
	[id_embryo] [varchar](50) NULL,
 CONSTRAINT [PK_karet_media_pengeluaran] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[karet_media_transaction_log]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[karet_media_transaction_log](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[idpembuatanmedia] [int] NOT NULL,
	[isactive] [nvarchar](2) NOT NULL,
	[no_vessel] [int] NULL,
	[tglkeluar] [date] NULL,
	[reju_step] [int] NULL,
 CONSTRAINT [PK_karet_media_transaction_log] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[karet_media_type]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[karet_media_type](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nama_jenis] [nvarchar](50) NOT NULL,
	[keterangan] [text] NULL,
	[isactive] [nvarchar](2) NOT NULL,
 CONSTRAINT [PK_karet_media_jenis] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[karet_motherplan]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[karet_motherplan](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[idembryo] [int] NOT NULL,
	[idresource] [int] NULL,
	[idtreatment] [int] NOT NULL,
	[codese] [nvarchar](20) NULL,
	[certified] [nvarchar](5) NULL,
	[nocertified] [nvarchar](20) NULL,
	[initiationyear] [nvarchar](10) NULL,
	[tree] [nvarchar](15) NULL,
	[treepart] [nvarchar](20) NULL,
	[harvestdate] [date] NULL,
	[receptiondate] [date] NULL,
	[initiationdate] [date] NULL,
	[idmedium] [int] NULL,
	[germinationdate] [date] NULL,
	[germinationmedium] [nvarchar](20) NULL,
	[maturation2medium] [nvarchar](20) NULL,
	[maturation1medium] [nvarchar](20) NULL,
	[embryomedium] [nvarchar](20) NULL,
	[initiationmedium] [nvarchar](25) NULL,
	[leafsample] [nvarchar](25) NULL,
	[leafsamplelocation] [nvarchar](25) NULL,
	[leafsamplecirad] [nvarchar](10) NULL,
	[germinationse] [nvarchar](20) NULL,
	[used] [nvarchar](1) NOT NULL,
	[isactive] [nvarchar](1) NULL,
	[deactive] [nvarchar](5) NULL,
 CONSTRAINT [PK__karet_mo__3213E83F9F9BD2A0] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[karet_motherplan_comment]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[karet_motherplan_comment](
	[comment_id] [int] IDENTITY(1,1) NOT NULL,
	[comment_motherplan] [int] NOT NULL,
	[comment_content] [text] NOT NULL,
	[comment_date] [date] NOT NULL,
 CONSTRAINT [PK_karet_motherplan_comment] PRIMARY KEY CLUSTERED 
(
	[comment_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[karet_motherplan_file]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_motherplan_file](
	[file_id] [int] IDENTITY(1,1) NOT NULL,
	[file_name] [varchar](50) NOT NULL,
	[file_location] [text] NOT NULL,
	[file_comment] [text] NOT NULL,
	[file_date] [date] NOT NULL,
	[file_motherplan] [int] NOT NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[karet_motherplant_in]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_motherplant_in](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_embryo] [int] NOT NULL,
	[codese] [varchar](25) NULL,
	[isactive] [int] NOT NULL,
	[is_available] [int] NOT NULL,
	[transferdate] [date] NULL,
	[worker] [int] NULL,
	[leafsample] [varchar](50) NULL,
	[resultofident] [varchar](50) NULL,
 CONSTRAINT [PK_karet_motherplant_in] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[karet_plantation]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_plantation](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[isactive] [nvarchar](2) NOT NULL,
	[description] [varchar](max) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[karet_plantation_block]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_plantation_block](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[idplantation] [int] NOT NULL,
	[description] [ntext] NULL,
	[isactive] [int] NOT NULL,
	[blocknumber] [varchar](50) NULL,
 CONSTRAINT [PK_karet_plantation_block] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[karet_plantation_panel]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_plantation_panel](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[idblock] [int] NOT NULL,
	[panelname] [varchar](50) NOT NULL,
	[description] [text] NULL,
	[isactive] [nvarchar](2) NOT NULL,
 CONSTRAINT [PK_karet_plantation_panel] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[karet_reception]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_reception](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[idtree] [int] NOT NULL,
	[harvestdate] [date] NULL,
	[senddate] [date] NULL,
	[receiptdate] [date] NULL,
	[flowersharvested] [int] NULL,
	[fruitsharvested] [int] NULL,
	[comment] [varchar](max) NULL,
	[isactive] [nvarchar](2) NOT NULL,
	[treepart] [int] NULL,
	[clone] [int] NULL,
	[plantation] [int] NULL,
	[block] [varchar](5) NULL,
	[line] [varchar](5) NULL,
	[is_available] [int] NULL,
 CONSTRAINT [PK__karet_re__3213E83F4291AD94] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[karet_reception_flowers]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[karet_reception_flowers](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[idreception] [int] NOT NULL,
	[flowersused] [int] NOT NULL,
	[rottenflowers] [int] NOT NULL,
	[totalflowersused] [int] NOT NULL,
	[isactive] [nvarchar](1) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[karet_reception_fruits]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[karet_reception_fruits](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[idreception] [int] NOT NULL,
	[fruitsused] [int] NULL,
	[woodyfruits] [int] NULL,
	[toosmallfruits] [int] NULL,
	[looseseeds] [int] NULL,
	[rottenfruits] [int] NULL,
	[totalseeds] [int] NULL,
	[isactive] [nvarchar](2) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[karet_reju_step]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_reju_step](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nama] [varchar](50) NOT NULL,
	[isactive] [int] NOT NULL,
 CONSTRAINT [PK_karet_reju_step] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[karet_transcallus]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[karet_transcallus](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_treatment] [int] NOT NULL,
	[callustransfer] [int] NULL,
	[transferdate] [date] NULL,
	[transferworker] [int] NULL,
	[transfercomment] [text] NULL,
	[mediacomment] [text] NULL,
	[isactive] [int] NULL,
	[laminar] [int] NULL,
	[contamination] [int] NULL,
	[id_mediatranslog] [int] NULL,
 CONSTRAINT [PK_karet_transcallus] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[karet_transfer_log]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[karet_transfer_log](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_treatment] [int] NOT NULL,
	[id_embryo] [int] NULL,
	[media] [int] NOT NULL,
	[idpengeluaranmedia] [int] NOT NULL,
	[transferdate] [date] NOT NULL,
 CONSTRAINT [PK_karet_transfer_log] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[karet_tree]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[karet_tree](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[idplantation] [int] NOT NULL,
	[block] [nvarchar](30) NULL,
	[treecode] [nvarchar](30) NULL,
	[yearofplanting] [nvarchar](30) NULL,
	[clonename] [int] NULL,
	[line] [nvarchar](30) NULL,
	[gps] [nvarchar](30) NULL,
	[certified] [nvarchar](5) NULL,
	[certificatenumber] [nvarchar](50) NULL,
	[isactive] [nvarchar](2) NOT NULL,
	[year] [nvarchar](6) NULL,
	[season] [nvarchar](20) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[karet_treepart]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_treepart](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[partname] [nvarchar](20) NOT NULL,
	[description] [varchar](max) NULL,
	[isactive] [nvarchar](2) NOT NULL,
 CONSTRAINT [PK__karet_tr__3213E83F05FFBBD8] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[karet_users]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_users](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[username] [varchar](20) NOT NULL,
	[password] [varchar](50) NOT NULL,
	[isactive] [int] NOT NULL,
 CONSTRAINT [PK_karet_users] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[karet_vessel]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_vessel](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[vesselcode] [nvarchar](15) NOT NULL,
	[vessel] [nvarchar](50) NOT NULL,
	[description] [varchar](max) NULL,
	[isactive] [nvarchar](2) NOT NULL,
 CONSTRAINT [PK__karet_ve__3213E83F47A50AD6] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[karet_worker]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[karet_worker](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[initial] [varchar](20) NOT NULL,
	[description] [text] NULL,
	[isactive] [int] NOT NULL,
	[status] [nvarchar](10) NULL,
	[name] [varchar](50) NULL,
	[kode_employee] [varchar](10) NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[master_pegawai]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[master_pegawai](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[kode_employee] [varchar](20) NULL,
	[nama] [varchar](50) NULL,
	[password] [varchar](50) NULL,
	[statusLogin] [char](1) NULL,
	[statusHapus] [char](1) NULL,
	[idUnit] [smallint] NULL,
	[idAtasan] [int] NULL,
	[idJabatan] [int] NULL,
	[kode] [varchar](20) NULL,
	[lastLogin] [datetime] NULL,
	[dna] [char](1) NULL,
 CONSTRAINT [PK_master_pegawai] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[master_pegawaibidang]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[master_pegawaibidang](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_pegawai] [int] NULL,
	[id_unit] [int] NULL,
	[id_bidang] [int] NULL,
	[kodepegawai] [varchar](50) NULL,
	[statusAktif] [char](1) NULL,
 CONSTRAINT [PK_master_pegawaibidang] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[master_pegawaijabatan]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[master_pegawaijabatan](
	[id] [int] NOT NULL,
	[nama] [varchar](50) NULL,
	[statusHapus] [char](1) NULL,
 CONSTRAINT [PK_lbkPegawaiJabatan] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[pekerja]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[pekerja](
	[id] [int] IDENTITY(17,1) NOT NULL,
	[idmandor] [varchar](10) NULL CONSTRAINT [DF__pekerja__idmando__1332DBDC]  DEFAULT (NULL),
	[kodepekerja] [nvarchar](6) NOT NULL,
	[namapekerja] [nvarchar](255) NOT NULL,
	[status] [nvarchar](12) NOT NULL,
	[isactive] [nvarchar](5) NULL CONSTRAINT [DF__pekerja__isactiv__14270015]  DEFAULT (NULL),
	[idunit] [varchar](5) NULL,
 CONSTRAINT [PK_pekerja_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[setting]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[setting](
	[id] [int] NOT NULL,
	[namaAplikasi] [varchar](50) NULL,
	[logo] [varchar](50) NULL,
 CONSTRAINT [PK_setting] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[unit]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING OFF
GO
CREATE TABLE [dbo].[unit](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[kodeunit] [varchar](5) NULL,
	[nama] [varchar](50) NULL,
	[alamat] [varchar](100) NULL,
	[noTelepon] [varchar](12) NULL,
	[email] [varchar](40) NULL,
	[statusAktif] [char](1) NULL,
 CONSTRAINT [PK_unit] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[unit_bidang]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[unit_bidang](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nama] [varchar](50) NULL,
 CONSTRAINT [PK_unit_bidang] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[user_role]    Script Date: 19/04/2020 11:07:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[user_role](
	[user_id] [int] NOT NULL,
	[role_id] [int] NOT NULL,
 CONSTRAINT [PK_user_role_user_id] PRIMARY KEY CLUSTERED 
(
	[user_id] ASC,
	[role_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET IDENTITY_INSERT [dbo].[app_roles] ON 

INSERT [dbo].[app_roles] ([id], [name], [role]) VALUES (1, N'ROLE_ADMIN', N'ROLE_ADMIN')
INSERT [dbo].[app_roles] ([id], [name], [role]) VALUES (2, N'ROLE_TCKARET', N'ROLE_TCKARET')
SET IDENTITY_INSERT [dbo].[app_roles] OFF
SET IDENTITY_INSERT [dbo].[app_users] ON 

INSERT [dbo].[app_users] ([id], [username], [password], [email], [is_active]) VALUES (1, N'admin', N'$2y$13$gVb3FeGTGoCKhoPLmbjh/.QV2QSslflAZBBKSE4AmGTaWrahHRXwO', N'admin@patologi.com', 1)
INSERT [dbo].[app_users] ([id], [username], [password], [email], [is_active]) VALUES (5, N'admintckaret', N'$2y$13$gVb3FeGTGoCKhoPLmbjh/.QV2QSslflAZBBKSE4AmGTaWrahHRXwO', N'admintckaret@socfindo.co.id', 1)
SET IDENTITY_INSERT [dbo].[app_users] OFF
SET IDENTITY_INSERT [dbo].[karet_clone] ON 

INSERT [dbo].[karet_clone] ([id], [clonename], [description], [isactive]) VALUES (2, N'PB330', N'Rejuvinasi', N'1')
INSERT [dbo].[karet_clone] ([id], [clonename], [description], [isactive]) VALUES (3, N'RRIC100', N'<p>Rejuvinasi</p>', N'1')
INSERT [dbo].[karet_clone] ([id], [clonename], [description], [isactive]) VALUES (4, N'IRCA41', N'<p>Rejuvinasi</p>', N'1')
INSERT [dbo].[karet_clone] ([id], [clonename], [description], [isactive]) VALUES (5, N'PB217', N'<p>Rejuvinasi</p>', N'1')
INSERT [dbo].[karet_clone] ([id], [clonename], [description], [isactive]) VALUES (6, N'PB260', N'<p>Rejuvinasi</p>', N'0')
INSERT [dbo].[karet_clone] ([id], [clonename], [description], [isactive]) VALUES (11, N'PB260', N'<p>Rejuvinasi</p>', N'1')
INSERT [dbo].[karet_clone] ([id], [clonename], [description], [isactive]) VALUES (12, N'IRCA19', N'<p>Rejuvinasi</p>', N'1')
INSERT [dbo].[karet_clone] ([id], [clonename], [description], [isactive]) VALUES (13, N'PB330S', NULL, N'0')
INSERT [dbo].[karet_clone] ([id], [clonename], [description], [isactive]) VALUES (14, N'PB254', NULL, N'1')
INSERT [dbo].[karet_clone] ([id], [clonename], [description], [isactive]) VALUES (15, N'IRCA331', NULL, N'1')
INSERT [dbo].[karet_clone] ([id], [clonename], [description], [isactive]) VALUES (17, N'XX331', N'Lorem ipsum dolor', N'0')
INSERT [dbo].[karet_clone] ([id], [clonename], [description], [isactive]) VALUES (18, N'IRCA007', N'', N'0')
INSERT [dbo].[karet_clone] ([id], [clonename], [description], [isactive]) VALUES (19, N'RCA2123', N'', N'0')
INSERT [dbo].[karet_clone] ([id], [clonename], [description], [isactive]) VALUES (20, N'BRAC11', N'', N'1')
INSERT [dbo].[karet_clone] ([id], [clonename], [description], [isactive]) VALUES (21, N'TEST12', N'adasdasdasd ', N'0')
SET IDENTITY_INSERT [dbo].[karet_clone] OFF
SET IDENTITY_INSERT [dbo].[karet_contamination] ON 

INSERT [dbo].[karet_contamination] ([id], [species], [deactive], [isactive]) VALUES (1, N'BACTERIA', N'Y', N'1')
INSERT [dbo].[karet_contamination] ([id], [species], [deactive], [isactive]) VALUES (2, N'FUNGI', N'Y', N'1')
INSERT [dbo].[karet_contamination] ([id], [species], [deactive], [isactive]) VALUES (3, N'ROTTEN', N'Y', N'1')
INSERT [dbo].[karet_contamination] ([id], [species], [deactive], [isactive]) VALUES (4, N'OXIDATED', N'Y', N'0')
INSERT [dbo].[karet_contamination] ([id], [species], [deactive], [isactive]) VALUES (5, N'BACTERIA PINK', N'Y', N'1')
INSERT [dbo].[karet_contamination] ([id], [species], [deactive], [isactive]) VALUES (6, N'FUNGI BLACKED', N'Y', N'0')
INSERT [dbo].[karet_contamination] ([id], [species], [deactive], [isactive]) VALUES (7, N'ENDOBACTERIA', N'Y', N'1')
INSERT [dbo].[karet_contamination] ([id], [species], [deactive], [isactive]) VALUES (8, N'FUNGI WHITE', N'Y', N'0')
INSERT [dbo].[karet_contamination] ([id], [species], [deactive], [isactive]) VALUES (9, N'VIRUS BLACK', N'Y', N'1')
INSERT [dbo].[karet_contamination] ([id], [species], [deactive], [isactive]) VALUES (10, N'FUNGI BLACk', N'Y', N'0')
INSERT [dbo].[karet_contamination] ([id], [species], [deactive], [isactive]) VALUES (11, N'FUNGIDERM', N'Y', N'0')
INSERT [dbo].[karet_contamination] ([id], [species], [deactive], [isactive]) VALUES (12, N'BACTERIA LACTOSA', N'Y', N'1')
INSERT [dbo].[karet_contamination] ([id], [species], [deactive], [isactive]) VALUES (13, N'BACTERIA TES 1', N'Y', N'1')
SET IDENTITY_INSERT [dbo].[karet_contamination] OFF
SET IDENTITY_INSERT [dbo].[karet_contamination_record] ON 

INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (14, 21, 0, 0, 0, 0, NULL, 1, 2, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (15, 21, 0, 0, 0, 0, NULL, 1, 2, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (16, 21, 0, 0, 0, 0, NULL, 1, 2, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (17, 22, 0, 0, 0, 0, NULL, 1, 2, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (18, 24, 0, 0, 0, 0, NULL, 1, 2, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (19, 22, 0, 0, 0, 0, NULL, 1, 2, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (20, 22, 0, 0, 0, 0, NULL, 1, 2, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (21, 23, 0, 0, 0, 0, NULL, 1, 2, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (23, 23, 0, 0, 0, 0, N'Not', 1, 3, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (24, 23, 0, 0, 0, 0, N'Nothing Contaminated', 1, 3, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (25, 23, 0, 0, 0, 0, N'Nothing Contaminated', 1, 3, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (26, 23, 0, 1, 0, 0, N'1 Contamination by Bacteri', 1, 3, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (27, 22, 0, 0, 0, 0, N'', 1, 3, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (28, 22, 0, 0, 0, 0, N'', 1, 3, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (29, 22, 0, 0, 0, 0, N'', 1, 3, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (30, 21, 0, 0, 0, 0, N'', 1, 3, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (33, NULL, 0, 0, 0, 0, N'', 1, 3, 1)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (34, NULL, 0, 0, 0, 0, N'', 1, 3, 1)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (35, NULL, 0, 0, 0, 0, N'', 1, 3, 1)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (36, 24, 0, 0, 0, 0, N'not contaminated', 1, 3, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (37, NULL, 0, 0, 0, 0, N'Not contaminated', 1, 3, 1)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (38, NULL, 0, 0, 0, 0, N'not contaminated', 1, 3, 1)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (39, NULL, 0, 0, 0, 0, N'embryo still save', 1, 3, 1)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (40, 24, 0, 0, 0, 0, NULL, 1, 2, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (41, 24, 0, 0, 0, 0, N'', 1, 3, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (42, NULL, 0, 0, 0, 0, N'not contaminated', 1, 3, 2)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (43, 31, 0, 0, 0, 0, NULL, 1, 2, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (44, 31, 0, 0, 0, 0, N'', 1, 3, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (45, NULL, 0, 0, 0, 0, N'asd asdas das a', 1, 3, 3)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (46, NULL, 0, 0, 0, 0, N'asdasd', 1, 5, 1)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (47, NULL, 0, 0, 0, 0, N'asdas ad as ', 1, 5, 1)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (48, 31, 0, 0, 0, 0, NULL, 1, 2, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (49, NULL, 0, 0, 0, 0, N'still save', 1, 3, 2)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (50, NULL, 0, 0, 0, 0, N'', 1, 3, 2)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (51, 23, 0, 0, 0, 0, N'asd asda aad', 1, 3, 2)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (52, 31, 0, 0, 0, 0, N' kajdkasjdk jaksj a', 1, 3, 4)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (53, NULL, 0, 0, 0, 0, N'jasdj jas dja', 1, 5, 3)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (54, 23, 0, 0, 0, 0, N'asd kadka skdaskd ', 1, 4, 2)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (55, NULL, 0, 0, 0, 0, N'aklsdk akdkad kakds', 1, 5, 1)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (56, 23, 0, 0, 0, 0, N'aksd kadk asdk akd a', 1, 3, 6)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (57, 34, 0, 0, 0, 0, NULL, 1, 2, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (58, 35, 0, 0, 0, 0, NULL, 1, 2, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (59, 36, 0, 0, 0, 0, NULL, 1, 2, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (60, 34, 0, 0, 0, 0, N'', 1, 3, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (61, 34, 0, 0, 0, 0, N'', 1, 3, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (62, 35, 0, 0, 0, 0, N'', 1, 3, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (63, 36, 0, 0, 0, 0, N'', 1, 3, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (64, 33, 0, 0, 0, 0, NULL, 1, 2, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (65, 34, 0, 0, 0, 0, N'', 1, 3, 7)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (66, 35, 0, 0, 0, 0, N'', 1, 3, 8)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (67, 34, 0, 0, 0, 0, N'', 1, 4, 7)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (68, 23, 0, 0, 0, 0, N'', 1, 4, 6)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (69, 23, 0, 0, 0, 0, N'', 1, 3, 5)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (70, 35, 1, 0, 1, 1, N'', 1, 4, 8)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (71, 31, 0, 0, 0, 1, N'jelek', 1, 4, 4)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (72, NULL, 0, 0, 0, 0, N'', 1, 5, 6)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (73, 0, 0, 0, 0, 0, N'', 1, 3, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (74, 37, 0, 0, 0, 0, NULL, 1, 2, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (75, 38, 0, 0, 0, 0, NULL, 1, 2, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (76, 37, 0, 0, 0, 0, N'', 1, 3, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (77, 37, 0, 0, 0, 0, N'', 1, 3, 9)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (78, 37, 0, 0, 0, 0, N'', 1, 4, 9)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (79, 37, 0, 0, 0, 0, N'', 1, 3, 10)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (80, 37, 1, 1, 1, 1, N'', 1, 4, 10)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (81, NULL, 0, 0, 0, 0, N'', 1, 5, 9)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (82, 41, 0, 0, 0, 0, NULL, 1, 2, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (83, 44, 0, 0, 0, 0, NULL, 1, 2, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (84, 41, 0, 0, 0, 0, N'', 1, 3, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (85, 44, 0, 0, 0, 0, N'', 1, 3, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (86, 41, 0, 0, 0, 0, N'', 1, 3, 11)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (87, 41, 0, 0, 0, 0, N'', 1, 3, 12)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (88, 44, 0, 0, 0, 0, N'', 1, 3, 13)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (89, 44, 1, 0, 0, 0, N'', 1, 3, 14)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (90, 42, 0, 0, 0, 0, NULL, 1, 2, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (91, 42, 0, 0, 0, 0, N'', 1, 3, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (92, 44, 0, 0, 0, 0, N'', 1, 3, 15)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (93, 44, 0, 0, 0, 0, N'', 1, 3, 16)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (94, 44, 0, 0, 0, 0, N'', 1, 3, 17)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (95, 44, 1, 0, 0, 0, N'', 1, 3, 17)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (96, 41, 0, 0, 0, 0, N'', 1, 4, 11)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (97, 41, 0, 0, 0, 0, N'', 1, 4, 12)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (98, 44, 0, 0, 0, 0, N'', 1, 4, 13)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (99, 44, 1, 0, 0, 0, N'', 1, 4, 15)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (100, 44, 0, 0, 0, 0, N'', 1, 4, 16)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (101, NULL, 0, 0, 0, 0, N'', 1, 5, 16)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (102, NULL, 0, 0, 0, 0, N'', 1, 5, 13)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (103, 43, 0, 0, 0, 0, NULL, 1, 2, NULL)
INSERT [dbo].[karet_contamination_record] ([id], [id_treatment], [contamination_fungi], [contamination_bact], [pink], [dead], [comments], [isactive], [reju_step], [id_embryo]) VALUES (104, 23, 0, 0, 0, 0, NULL, 1, 2, NULL)
SET IDENTITY_INSERT [dbo].[karet_contamination_record] OFF
SET IDENTITY_INSERT [dbo].[karet_embryo] ON 

INSERT [dbo].[karet_embryo] ([id], [id_treatment], [isactive], [id_initiation_trans]) VALUES (1, 23, 1, 8)
INSERT [dbo].[karet_embryo] ([id], [id_treatment], [isactive], [id_initiation_trans]) VALUES (2, 23, 1, 8)
INSERT [dbo].[karet_embryo] ([id], [id_treatment], [isactive], [id_initiation_trans]) VALUES (3, 24, 1, 9)
INSERT [dbo].[karet_embryo] ([id], [id_treatment], [isactive], [id_initiation_trans]) VALUES (4, 31, 1, 10)
INSERT [dbo].[karet_embryo] ([id], [id_treatment], [isactive], [id_initiation_trans]) VALUES (5, 23, 1, 8)
INSERT [dbo].[karet_embryo] ([id], [id_treatment], [isactive], [id_initiation_trans]) VALUES (6, 23, 1, 8)
INSERT [dbo].[karet_embryo] ([id], [id_treatment], [isactive], [id_initiation_trans]) VALUES (7, 34, 1, 12)
INSERT [dbo].[karet_embryo] ([id], [id_treatment], [isactive], [id_initiation_trans]) VALUES (8, 35, 1, 13)
INSERT [dbo].[karet_embryo] ([id], [id_treatment], [isactive], [id_initiation_trans]) VALUES (9, 37, 1, 15)
INSERT [dbo].[karet_embryo] ([id], [id_treatment], [isactive], [id_initiation_trans]) VALUES (10, 37, 1, 15)
INSERT [dbo].[karet_embryo] ([id], [id_treatment], [isactive], [id_initiation_trans]) VALUES (11, 41, 1, 16)
INSERT [dbo].[karet_embryo] ([id], [id_treatment], [isactive], [id_initiation_trans]) VALUES (12, 41, 1, 16)
INSERT [dbo].[karet_embryo] ([id], [id_treatment], [isactive], [id_initiation_trans]) VALUES (13, 44, 1, 17)
INSERT [dbo].[karet_embryo] ([id], [id_treatment], [isactive], [id_initiation_trans]) VALUES (14, 44, 1, 17)
INSERT [dbo].[karet_embryo] ([id], [id_treatment], [isactive], [id_initiation_trans]) VALUES (15, 44, 1, 17)
INSERT [dbo].[karet_embryo] ([id], [id_treatment], [isactive], [id_initiation_trans]) VALUES (16, 44, 1, 17)
INSERT [dbo].[karet_embryo] ([id], [id_treatment], [isactive], [id_initiation_trans]) VALUES (17, 44, 1, 17)
SET IDENTITY_INSERT [dbo].[karet_embryo] OFF
SET IDENTITY_INSERT [dbo].[karet_embryo_germination] ON 

INSERT [dbo].[karet_embryo_germination] ([id], [id_embryo], [transferdate], [germ_worker], [idmedia], [laminar], [cultureroom], [nobox], [comment], [is_available], [isactive], [connected_to_other], [shape_of_embryo], [size_of_embryo], [comment_embryo], [type_of_callus], [color_of_callus], [comment_callus], [idpengeluaranmedia]) VALUES (4, 1, CAST(N'2020-02-07' AS Date), 2, 5, 5, N'1', N'1', NULL, 1, 1, N'No', N'Heart', N'S', N'had kahda ', N'Loose', N'Yellow', N'aksd kashdk a', 1126)
INSERT [dbo].[karet_embryo_germination] ([id], [id_embryo], [transferdate], [germ_worker], [idmedia], [laminar], [cultureroom], [nobox], [comment], [is_available], [isactive], [connected_to_other], [shape_of_embryo], [size_of_embryo], [comment_embryo], [type_of_callus], [color_of_callus], [comment_callus], [idpengeluaranmedia]) VALUES (8, 3, CAST(N'2020-02-25' AS Date), 2, 5, 2, N'4', N'2', NULL, 0, 1, N'No', N'Heart', N'L', N'as adkootteo ', N'Compact', N'Brown', N'as ksjlkh alskhdl lahsdlaks', 83)
INSERT [dbo].[karet_embryo_germination] ([id], [id_embryo], [transferdate], [germ_worker], [idmedia], [laminar], [cultureroom], [nobox], [comment], [is_available], [isactive], [connected_to_other], [shape_of_embryo], [size_of_embryo], [comment_embryo], [type_of_callus], [color_of_callus], [comment_callus], [idpengeluaranmedia]) VALUES (9, 7, CAST(N'2020-03-10' AS Date), 4, 5, 6, N'2', N'1', NULL, 1, 1, N'No', N'Torpedo', N'S', N'', N'Compact', N'Yellow', N'', 1123)
INSERT [dbo].[karet_embryo_germination] ([id], [id_embryo], [transferdate], [germ_worker], [idmedia], [laminar], [cultureroom], [nobox], [comment], [is_available], [isactive], [connected_to_other], [shape_of_embryo], [size_of_embryo], [comment_embryo], [type_of_callus], [color_of_callus], [comment_callus], [idpengeluaranmedia]) VALUES (10, 6, CAST(N'2020-03-04' AS Date), 4, 5, 6, N'2', N'1', NULL, 0, 1, N'No', N'Torpedo', N'S', N'', N'Loose', N'Yellow', N'', 95)
INSERT [dbo].[karet_embryo_germination] ([id], [id_embryo], [transferdate], [germ_worker], [idmedia], [laminar], [cultureroom], [nobox], [comment], [is_available], [isactive], [connected_to_other], [shape_of_embryo], [size_of_embryo], [comment_embryo], [type_of_callus], [color_of_callus], [comment_callus], [idpengeluaranmedia]) VALUES (11, 9, CAST(N'2020-03-20' AS Date), 4, 5, 9, N'2', N'1', NULL, 0, 1, N'No', N'Heart', N'S', N'', N'Loose', N'Yellow', N'', 99)
INSERT [dbo].[karet_embryo_germination] ([id], [id_embryo], [transferdate], [germ_worker], [idmedia], [laminar], [cultureroom], [nobox], [comment], [is_available], [isactive], [connected_to_other], [shape_of_embryo], [size_of_embryo], [comment_embryo], [type_of_callus], [color_of_callus], [comment_callus], [idpengeluaranmedia]) VALUES (12, 11, CAST(N'2020-04-02' AS Date), 2, 5, 5, N'2', N'1', NULL, 1, 1, N'Yes', N'Globular', N'S', N'', N'Loose', N'Yellow', N'', 1115)
INSERT [dbo].[karet_embryo_germination] ([id], [id_embryo], [transferdate], [germ_worker], [idmedia], [laminar], [cultureroom], [nobox], [comment], [is_available], [isactive], [connected_to_other], [shape_of_embryo], [size_of_embryo], [comment_embryo], [type_of_callus], [color_of_callus], [comment_callus], [idpengeluaranmedia]) VALUES (13, 12, CAST(N'2020-04-02' AS Date), 6, 5, 9, N'2', N'1', NULL, 1, 1, N'Yes', N'Heart', N'L', N'', N'Loose', N'Yellow', N'', 1127)
INSERT [dbo].[karet_embryo_germination] ([id], [id_embryo], [transferdate], [germ_worker], [idmedia], [laminar], [cultureroom], [nobox], [comment], [is_available], [isactive], [connected_to_other], [shape_of_embryo], [size_of_embryo], [comment_embryo], [type_of_callus], [color_of_callus], [comment_callus], [idpengeluaranmedia]) VALUES (14, 13, CAST(N'2020-04-02' AS Date), 3, 5, 6, N'2', N'1', NULL, 1, 1, N'No', N'Heart', N'S', N'', N'Loose', N'Yellow', N'', 1125)
INSERT [dbo].[karet_embryo_germination] ([id], [id_embryo], [transferdate], [germ_worker], [idmedia], [laminar], [cultureroom], [nobox], [comment], [is_available], [isactive], [connected_to_other], [shape_of_embryo], [size_of_embryo], [comment_embryo], [type_of_callus], [color_of_callus], [comment_callus], [idpengeluaranmedia]) VALUES (15, 16, CAST(N'2020-04-02' AS Date), 4, 5, 5, N'2', N'1', NULL, 0, 1, N'No', N'Torpedo', N'S', N'', N'Loose', N'Yellow', N'', 1118)
INSERT [dbo].[karet_embryo_germination] ([id], [id_embryo], [transferdate], [germ_worker], [idmedia], [laminar], [cultureroom], [nobox], [comment], [is_available], [isactive], [connected_to_other], [shape_of_embryo], [size_of_embryo], [comment_embryo], [type_of_callus], [color_of_callus], [comment_callus], [idpengeluaranmedia]) VALUES (16, 2, CAST(N'2020-04-19' AS Date), 3, 5, 6, N'1', N'1', NULL, 1, 1, N'No', N'Globular', N'S', N'a adasd adasd', N'Loose', N'Yellow', N'asda asdada dasd', 1128)
SET IDENTITY_INSERT [dbo].[karet_embryo_germination] OFF
SET IDENTITY_INSERT [dbo].[karet_embryo_germination_prepare] ON 

INSERT [dbo].[karet_embryo_germination_prepare] ([id], [id_embryo], [germ_date], [shoot], [germinated], [comment], [isactive], [is_available], [germ_worker], [idmedia], [idpengeluaranmedia]) VALUES (2, 1, CAST(N'2020-02-06' AS Date), N'No', N'ZE', N'uaoiwaowhao haodasodoa ', 1, 1, 6, 5, 1126)
INSERT [dbo].[karet_embryo_germination_prepare] ([id], [id_embryo], [germ_date], [shoot], [germinated], [comment], [isactive], [is_available], [germ_worker], [idmedia], [idpengeluaranmedia]) VALUES (3, 3, CAST(N'2020-03-04' AS Date), N'Yes', N'SE', N'', 1, 1, 4, 5, 83)
INSERT [dbo].[karet_embryo_germination_prepare] ([id], [id_embryo], [germ_date], [shoot], [germinated], [comment], [isactive], [is_available], [germ_worker], [idmedia], [idpengeluaranmedia]) VALUES (4, 6, CAST(N'2020-03-04' AS Date), N'Yes', N'SE', N'', 1, 1, 3, 5, 95)
INSERT [dbo].[karet_embryo_germination_prepare] ([id], [id_embryo], [germ_date], [shoot], [germinated], [comment], [isactive], [is_available], [germ_worker], [idmedia], [idpengeluaranmedia]) VALUES (5, 9, CAST(N'2020-03-20' AS Date), N'No', N'SE', N'', 1, 1, 6, 5, 99)
INSERT [dbo].[karet_embryo_germination_prepare] ([id], [id_embryo], [germ_date], [shoot], [germinated], [comment], [isactive], [is_available], [germ_worker], [idmedia], [idpengeluaranmedia]) VALUES (6, 16, CAST(N'2020-04-02' AS Date), N'Yes', N'SE', N'', 1, 1, 2, 5, 1118)
SET IDENTITY_INSERT [dbo].[karet_embryo_germination_prepare] OFF
SET IDENTITY_INSERT [dbo].[karet_embryo_germination_prepare_screening] ON 

INSERT [dbo].[karet_embryo_germination_prepare_screening] ([id], [id_embryo], [screening_date], [screening_worker], [screening_checkpoint], [comment], [idcontaminationrecord], [isactive]) VALUES (1, 1, CAST(N'2020-02-07' AS Date), 3, 1, N'adasdasad', 47, 1)
INSERT [dbo].[karet_embryo_germination_prepare_screening] ([id], [id_embryo], [screening_date], [screening_worker], [screening_checkpoint], [comment], [idcontaminationrecord], [isactive]) VALUES (2, 1, CAST(N'2020-02-27' AS Date), 2, 2, N'lkl ljlkjlj', 55, 1)
SET IDENTITY_INSERT [dbo].[karet_embryo_germination_prepare_screening] OFF
SET IDENTITY_INSERT [dbo].[karet_embryo_germination_screening] ON 

INSERT [dbo].[karet_embryo_germination_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (1, 1, CAST(N'2020-02-07' AS Date), 1, N'asdaasd', 1, 46, 4)
INSERT [dbo].[karet_embryo_germination_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (2, 3, CAST(N'2020-02-27' AS Date), 1, N' asd a as a', 1, 53, 4)
INSERT [dbo].[karet_embryo_germination_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (3, 6, CAST(N'2020-03-04' AS Date), 1, N'adad', 1, 72, 3)
INSERT [dbo].[karet_embryo_germination_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (4, 9, CAST(N'2020-03-20' AS Date), 1, N'', 1, 81, 4)
INSERT [dbo].[karet_embryo_germination_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (5, 16, CAST(N'2020-04-02' AS Date), 1, N'', 1, 101, 3)
INSERT [dbo].[karet_embryo_germination_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (6, 13, CAST(N'2020-04-02' AS Date), 1, N'', 1, 102, 2)
SET IDENTITY_INSERT [dbo].[karet_embryo_germination_screening] OFF
SET IDENTITY_INSERT [dbo].[karet_embryo_maturation_1] ON 

INSERT [dbo].[karet_embryo_maturation_1] ([id], [id_embryo], [transferdate], [maturation_worker], [idmedia], [laminar], [isactive], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (1, 1, CAST(N'2020-01-20' AS Date), 4, 3, 2, 1, N'1', N'1', 0, NULL, NULL)
INSERT [dbo].[karet_embryo_maturation_1] ([id], [id_embryo], [transferdate], [maturation_worker], [idmedia], [laminar], [isactive], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (2, 2, CAST(N'2020-01-20' AS Date), 4, 3, 2, 1, N'1', N'1', 0, NULL, 66)
INSERT [dbo].[karet_embryo_maturation_1] ([id], [id_embryo], [transferdate], [maturation_worker], [idmedia], [laminar], [isactive], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (3, 3, CAST(N'2020-02-07' AS Date), 2, 3, 2, 1, N'1', N'1', 0, NULL, NULL)
INSERT [dbo].[karet_embryo_maturation_1] ([id], [id_embryo], [transferdate], [maturation_worker], [idmedia], [laminar], [isactive], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (4, 4, CAST(N'2020-02-04' AS Date), 6, 3, 6, 1, N'1', N'1', 0, N'', 66)
INSERT [dbo].[karet_embryo_maturation_1] ([id], [id_embryo], [transferdate], [maturation_worker], [idmedia], [laminar], [isactive], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (5, 5, CAST(N'2020-01-06' AS Date), 2, 3, 5, 1, N'1', N'1', 1, NULL, NULL)
INSERT [dbo].[karet_embryo_maturation_1] ([id], [id_embryo], [transferdate], [maturation_worker], [idmedia], [laminar], [isactive], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (6, 6, CAST(N'2020-01-06' AS Date), 2, 3, 5, 1, N'1', N'1', 0, NULL, NULL)
INSERT [dbo].[karet_embryo_maturation_1] ([id], [id_embryo], [transferdate], [maturation_worker], [idmedia], [laminar], [isactive], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (7, 7, CAST(N'2020-03-04' AS Date), 4, 3, 8, 1, N'2', N'1', 0, NULL, NULL)
INSERT [dbo].[karet_embryo_maturation_1] ([id], [id_embryo], [transferdate], [maturation_worker], [idmedia], [laminar], [isactive], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (8, 8, CAST(N'2020-03-04' AS Date), 3, 3, 9, 1, N'2', N'1', 0, NULL, NULL)
INSERT [dbo].[karet_embryo_maturation_1] ([id], [id_embryo], [transferdate], [maturation_worker], [idmedia], [laminar], [isactive], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (9, 9, CAST(N'2020-03-20' AS Date), 2, 18, 5, 1, N'2', N'1', 0, NULL, NULL)
INSERT [dbo].[karet_embryo_maturation_1] ([id], [id_embryo], [transferdate], [maturation_worker], [idmedia], [laminar], [isactive], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (10, 10, CAST(N'2020-03-20' AS Date), 2, 18, 5, 1, N'2', N'1', 0, NULL, NULL)
INSERT [dbo].[karet_embryo_maturation_1] ([id], [id_embryo], [transferdate], [maturation_worker], [idmedia], [laminar], [isactive], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (11, 11, CAST(N'2020-04-02' AS Date), 3, 3, 8, 1, N'2', N'1', 0, NULL, NULL)
INSERT [dbo].[karet_embryo_maturation_1] ([id], [id_embryo], [transferdate], [maturation_worker], [idmedia], [laminar], [isactive], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (12, 12, CAST(N'2020-04-02' AS Date), 4, 3, 5, 1, N'2', N'1', 0, NULL, NULL)
INSERT [dbo].[karet_embryo_maturation_1] ([id], [id_embryo], [transferdate], [maturation_worker], [idmedia], [laminar], [isactive], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (13, 13, CAST(N'2020-04-02' AS Date), 2, 3, 8, 1, N'2', N'1', 0, NULL, NULL)
INSERT [dbo].[karet_embryo_maturation_1] ([id], [id_embryo], [transferdate], [maturation_worker], [idmedia], [laminar], [isactive], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (14, 14, CAST(N'2020-04-02' AS Date), 2, 3, 8, 1, N'2', N'1', 1, NULL, NULL)
INSERT [dbo].[karet_embryo_maturation_1] ([id], [id_embryo], [transferdate], [maturation_worker], [idmedia], [laminar], [isactive], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (15, 15, CAST(N'2020-04-02' AS Date), 2, 3, 8, 1, N'2', N'1', 0, NULL, NULL)
INSERT [dbo].[karet_embryo_maturation_1] ([id], [id_embryo], [transferdate], [maturation_worker], [idmedia], [laminar], [isactive], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (16, 16, CAST(N'2020-04-02' AS Date), 2, 3, 8, 1, N'2', N'1', 0, NULL, NULL)
INSERT [dbo].[karet_embryo_maturation_1] ([id], [id_embryo], [transferdate], [maturation_worker], [idmedia], [laminar], [isactive], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (17, 17, CAST(N'2020-04-02' AS Date), 2, 3, 8, 1, N'2', N'1', 1, NULL, NULL)
SET IDENTITY_INSERT [dbo].[karet_embryo_maturation_1] OFF
SET IDENTITY_INSERT [dbo].[karet_embryo_maturation_2] ON 

INSERT [dbo].[karet_embryo_maturation_2] ([id], [id_embryo], [transferdate], [maturation2_worker], [laminar], [isactive], [idmedia], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (4, 1, CAST(N'2020-02-03' AS Date), 4, 9, 1, 4, N'1', N'1', 0, N'Transfer to Maturation II', NULL)
INSERT [dbo].[karet_embryo_maturation_2] ([id], [id_embryo], [transferdate], [maturation2_worker], [laminar], [isactive], [idmedia], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (5, 3, CAST(N'2020-01-27' AS Date), 4, 6, 1, 4, N'2', N'2', 0, N'', 80)
INSERT [dbo].[karet_embryo_maturation_2] ([id], [id_embryo], [transferdate], [maturation2_worker], [laminar], [isactive], [idmedia], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (18, 4, CAST(N'2020-03-02' AS Date), 2, 5, 1, 4, N'2', N'2', 1, N'', 81)
INSERT [dbo].[karet_embryo_maturation_2] ([id], [id_embryo], [transferdate], [maturation2_worker], [laminar], [isactive], [idmedia], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (19, 2, CAST(N'2020-03-02' AS Date), 2, 5, 1, 4, N'3', N'2', 0, N'asajas asda sa', 81)
INSERT [dbo].[karet_embryo_maturation_2] ([id], [id_embryo], [transferdate], [maturation2_worker], [laminar], [isactive], [idmedia], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (20, 7, CAST(N'2020-03-04' AS Date), 4, 5, 1, 4, N'2', N'1', 0, N'', 91)
INSERT [dbo].[karet_embryo_maturation_2] ([id], [id_embryo], [transferdate], [maturation2_worker], [laminar], [isactive], [idmedia], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (21, 6, CAST(N'2020-03-04' AS Date), 4, 8, 1, 4, N'2', N'1', 0, N'', 92)
INSERT [dbo].[karet_embryo_maturation_2] ([id], [id_embryo], [transferdate], [maturation2_worker], [laminar], [isactive], [idmedia], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (22, 8, CAST(N'2020-03-03' AS Date), 4, 6, 1, 4, N'2', N'1', 1, N'', 93)
INSERT [dbo].[karet_embryo_maturation_2] ([id], [id_embryo], [transferdate], [maturation2_worker], [laminar], [isactive], [idmedia], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (23, 9, CAST(N'2020-03-20' AS Date), 3, 5, 1, 4, N'2', N'1', 0, N'', 98)
INSERT [dbo].[karet_embryo_maturation_2] ([id], [id_embryo], [transferdate], [maturation2_worker], [laminar], [isactive], [idmedia], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (24, 10, CAST(N'2020-03-20' AS Date), 6, 6, 1, 4, N'2', N'1', 1, N'', 100)
INSERT [dbo].[karet_embryo_maturation_2] ([id], [id_embryo], [transferdate], [maturation2_worker], [laminar], [isactive], [idmedia], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (25, 11, CAST(N'2020-04-02' AS Date), 2, 5, 1, 4, N'2', N'1', 0, N'', 1110)
INSERT [dbo].[karet_embryo_maturation_2] ([id], [id_embryo], [transferdate], [maturation2_worker], [laminar], [isactive], [idmedia], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (26, 12, CAST(N'2020-04-02' AS Date), 3, 6, 1, 4, N'2', N'1', 0, N'', 1111)
INSERT [dbo].[karet_embryo_maturation_2] ([id], [id_embryo], [transferdate], [maturation2_worker], [laminar], [isactive], [idmedia], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (27, 13, CAST(N'2020-04-02' AS Date), 4, 8, 1, 4, N'2', N'1', 0, N'', 1112)
INSERT [dbo].[karet_embryo_maturation_2] ([id], [id_embryo], [transferdate], [maturation2_worker], [laminar], [isactive], [idmedia], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (28, 15, CAST(N'2020-04-02' AS Date), 4, 5, 1, 4, N'2', N'1', 1, N'', 1113)
INSERT [dbo].[karet_embryo_maturation_2] ([id], [id_embryo], [transferdate], [maturation2_worker], [laminar], [isactive], [idmedia], [cultureroom], [nobox], [is_available], [comment], [idpengeluaranmedia]) VALUES (29, 16, CAST(N'2020-04-02' AS Date), 2, 8, 1, 4, N'2', N'1', 0, N'', 1114)
SET IDENTITY_INSERT [dbo].[karet_embryo_maturation_2] OFF
SET IDENTITY_INSERT [dbo].[karet_embryo_maturation1_screening] ON 

INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (1, 1, CAST(N'2020-01-17' AS Date), 1, N'Nothing grow', 1, 33, 4)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (2, 1, CAST(N'2020-01-24' AS Date), 2, N'Little bit grow', 1, 34, 4)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (3, 1, CAST(N'2020-01-31' AS Date), 3, N'Ready for Transfer', 1, 35, 2)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (4, 1, CAST(N'2020-01-24' AS Date), 4, N'first screening', 1, 37, 4)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (5, 2, CAST(N'2020-01-31' AS Date), 1, N'first screening', 1, 42, 3)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (6, 2, CAST(N'2020-02-12' AS Date), 2, N'2nd screening', 1, 49, 1)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (7, 2, CAST(N'2020-02-24' AS Date), 3, N'Growing embryo', 1, 50, 3)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (11, 2, CAST(N'2020-02-27' AS Date), 4, N'dsadas', 1, 51, 3)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (12, 4, CAST(N'2020-02-24' AS Date), 1, N'aksa akjdaks ', 1, 52, 2)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (13, 6, CAST(N'2020-03-02' AS Date), 1, N'sad asd asdas daa', 1, 56, 2)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (14, 7, CAST(N'2020-03-10' AS Date), 1, N'', 1, 65, 2)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (15, 8, CAST(N'2020-03-03' AS Date), 1, N'', 1, 66, 4)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (16, 5, CAST(N'2020-03-04' AS Date), 1, N'', 1, 69, 4)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (17, 9, CAST(N'2020-03-20' AS Date), 1, N'', 1, 77, 2)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (18, 10, CAST(N'2020-03-20' AS Date), 1, N'', 1, 79, 3)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (19, 11, CAST(N'2020-04-02' AS Date), 1, N'', 1, 86, 2)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (20, 12, CAST(N'2020-04-02' AS Date), 1, N'', 1, 87, 6)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (21, 13, CAST(N'2020-04-02' AS Date), 1, N'', 1, 88, 1)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (22, 14, CAST(N'2020-04-02' AS Date), 1, N'', 1, 89, 2)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (23, 15, CAST(N'2020-04-02' AS Date), 1, N'', 1, 92, 2)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (24, 16, CAST(N'2020-04-02' AS Date), 1, N'', 1, 93, 3)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (25, 17, CAST(N'2020-04-02' AS Date), 1, N'', 1, 94, 6)
INSERT [dbo].[karet_embryo_maturation1_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [comment], [isactive], [idcontaminationrecord], [screening_worker]) VALUES (26, 17, CAST(N'2020-04-01' AS Date), 2, N'', 1, 95, 3)
SET IDENTITY_INSERT [dbo].[karet_embryo_maturation1_screening] OFF
SET IDENTITY_INSERT [dbo].[karet_embryo_maturation2_screening] ON 

INSERT [dbo].[karet_embryo_maturation2_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [screening_worker], [isactive], [idcontaminationrecord], [comment]) VALUES (1, 1, CAST(N'2020-01-24' AS Date), 1, 3, 1, 38, N'first screening')
INSERT [dbo].[karet_embryo_maturation2_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [screening_worker], [isactive], [idcontaminationrecord], [comment]) VALUES (2, 1, CAST(N'2020-01-31' AS Date), 2, 4, 1, 39, N'second screening')
INSERT [dbo].[karet_embryo_maturation2_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [screening_worker], [isactive], [idcontaminationrecord], [comment]) VALUES (3, 3, CAST(N'2020-02-07' AS Date), 1, 2, 1, 45, N'')
INSERT [dbo].[karet_embryo_maturation2_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [screening_worker], [isactive], [idcontaminationrecord], [comment]) VALUES (4, 2, CAST(N'2020-02-12' AS Date), 1, 2, 1, 54, N'aksdn aksdna sk')
INSERT [dbo].[karet_embryo_maturation2_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [screening_worker], [isactive], [idcontaminationrecord], [comment]) VALUES (5, 7, CAST(N'2020-03-10' AS Date), 1, 3, 1, 67, N'')
INSERT [dbo].[karet_embryo_maturation2_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [screening_worker], [isactive], [idcontaminationrecord], [comment]) VALUES (6, 6, CAST(N'2020-03-11' AS Date), 1, 6, 1, 68, N'')
INSERT [dbo].[karet_embryo_maturation2_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [screening_worker], [isactive], [idcontaminationrecord], [comment]) VALUES (7, 8, CAST(N'2020-03-20' AS Date), 1, 2, 1, 70, N'')
INSERT [dbo].[karet_embryo_maturation2_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [screening_worker], [isactive], [idcontaminationrecord], [comment]) VALUES (8, 4, CAST(N'2020-03-04' AS Date), 1, 4, 1, 71, N'')
INSERT [dbo].[karet_embryo_maturation2_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [screening_worker], [isactive], [idcontaminationrecord], [comment]) VALUES (9, 9, CAST(N'2020-03-20' AS Date), 1, 7, 1, 78, N'')
INSERT [dbo].[karet_embryo_maturation2_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [screening_worker], [isactive], [idcontaminationrecord], [comment]) VALUES (10, 10, CAST(N'2020-03-20' AS Date), 1, 4, 1, 80, N'')
INSERT [dbo].[karet_embryo_maturation2_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [screening_worker], [isactive], [idcontaminationrecord], [comment]) VALUES (11, 11, CAST(N'2020-04-02' AS Date), 1, 4, 1, 96, N'')
INSERT [dbo].[karet_embryo_maturation2_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [screening_worker], [isactive], [idcontaminationrecord], [comment]) VALUES (12, 12, CAST(N'2020-04-02' AS Date), 1, 2, 1, 97, N'')
INSERT [dbo].[karet_embryo_maturation2_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [screening_worker], [isactive], [idcontaminationrecord], [comment]) VALUES (13, 13, CAST(N'2020-04-02' AS Date), 1, 2, 1, 98, N'')
INSERT [dbo].[karet_embryo_maturation2_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [screening_worker], [isactive], [idcontaminationrecord], [comment]) VALUES (14, 15, CAST(N'2020-04-02' AS Date), 1, 3, 1, 99, N'')
INSERT [dbo].[karet_embryo_maturation2_screening] ([id], [id_embryo], [screening_date], [screening_checkpoint], [screening_worker], [isactive], [idcontaminationrecord], [comment]) VALUES (15, 16, CAST(N'2020-04-02' AS Date), 1, 7, 1, 100, N'')
SET IDENTITY_INSERT [dbo].[karet_embryo_maturation2_screening] OFF
SET IDENTITY_INSERT [dbo].[karet_initiation] ON 

INSERT [dbo].[karet_initiation] ([id_treatment], [id_reception], [nobox], [sample], [initiation_date], [widthseed], [numberofseeds], [seedcomments], [se], [ze], [initiation_worker], [laminar], [isactive], [treatmentcomment], [remaining_sample], [barcode], [remaining_petri], [idmedia], [idpengeluaranmedia]) VALUES (21, 1, 1, N'FRUITS', CAST(N'2020-01-14' AS Date), CAST(10 AS Decimal(18, 0)), 5, N'', 90, 0, 5, 5, N'1', N'', 0, N'00001_PB260_00021_RAH_1A_20200114_T', 0, 1, NULL)
INSERT [dbo].[karet_initiation] ([id_treatment], [id_reception], [nobox], [sample], [initiation_date], [widthseed], [numberofseeds], [seedcomments], [se], [ze], [initiation_worker], [laminar], [isactive], [treatmentcomment], [remaining_sample], [barcode], [remaining_petri], [idmedia], [idpengeluaranmedia]) VALUES (22, 2, 1, N'FRUITS', CAST(N'2017-01-11' AS Date), CAST(15 AS Decimal(18, 0)), 10, N'Ada 20 Irisan (2 Petri) jatuh', 150, 0, 4, 2, N'1', N'', 0, N'00002_PB260_00022_RAN_1A_20170111_T', 0, 1, NULL)
INSERT [dbo].[karet_initiation] ([id_treatment], [id_reception], [nobox], [sample], [initiation_date], [widthseed], [numberofseeds], [seedcomments], [se], [ze], [initiation_worker], [laminar], [isactive], [treatmentcomment], [remaining_sample], [barcode], [remaining_petri], [idmedia], [idpengeluaranmedia]) VALUES (23, 53, 1, N'FRUITS', CAST(N'2020-01-15' AS Date), CAST(18 AS Decimal(18, 0)), 3, N'', 78, 0, 4, 6, N'1', N'', 5, N'00053_PB217_00023_RAN_1B_20200115_T', 1, 1, 1121)
INSERT [dbo].[karet_initiation] ([id_treatment], [id_reception], [nobox], [sample], [initiation_date], [widthseed], [numberofseeds], [seedcomments], [se], [ze], [initiation_worker], [laminar], [isactive], [treatmentcomment], [remaining_sample], [barcode], [remaining_petri], [idmedia], [idpengeluaranmedia]) VALUES (24, 54, 1, N'FRUITS', CAST(N'2020-01-15' AS Date), CAST(10 AS Decimal(18, 0)), 5, N'', 50, 0, 4, 8, N'1', N'', 0, N'00054_RRIC100_00024_RAN_1A_20200115_T', 0, 1, NULL)
INSERT [dbo].[karet_initiation] ([id_treatment], [id_reception], [nobox], [sample], [initiation_date], [widthseed], [numberofseeds], [seedcomments], [se], [ze], [initiation_worker], [laminar], [isactive], [treatmentcomment], [remaining_sample], [barcode], [remaining_petri], [idmedia], [idpengeluaranmedia]) VALUES (29, 3, 1, N'FRUITS', CAST(N'2020-01-08' AS Date), CAST(22 AS Decimal(18, 0)), 0, N'', 178, 0, 4, 6, N'1', N'', 178, NULL, 18, 1, NULL)
INSERT [dbo].[karet_initiation] ([id_treatment], [id_reception], [nobox], [sample], [initiation_date], [widthseed], [numberofseeds], [seedcomments], [se], [ze], [initiation_worker], [laminar], [isactive], [treatmentcomment], [remaining_sample], [barcode], [remaining_petri], [idmedia], [idpengeluaranmedia]) VALUES (30, 4, 1, N'FRUITS', CAST(N'2020-01-09' AS Date), CAST(15 AS Decimal(18, 0)), 0, N'', 56, 0, 4, 5, N'1', N'', 56, N'00004_PB330_00030_RAN_1B_20200109_T_1KDZJ', 6, 1, NULL)
INSERT [dbo].[karet_initiation] ([id_treatment], [id_reception], [nobox], [sample], [initiation_date], [widthseed], [numberofseeds], [seedcomments], [se], [ze], [initiation_worker], [laminar], [isactive], [treatmentcomment], [remaining_sample], [barcode], [remaining_petri], [idmedia], [idpengeluaranmedia]) VALUES (31, 55, 1, N'FRUITS', CAST(N'2020-02-05' AS Date), CAST(80 AS Decimal(18, 0)), 15, N'', 80, 0, 2, 5, N'1', N'', 0, N'00055_RRIC100_00031_RL_1B_20200207_T_kJS3z', 0, 1, NULL)
INSERT [dbo].[karet_initiation] ([id_treatment], [id_reception], [nobox], [sample], [initiation_date], [widthseed], [numberofseeds], [seedcomments], [se], [ze], [initiation_worker], [laminar], [isactive], [treatmentcomment], [remaining_sample], [barcode], [remaining_petri], [idmedia], [idpengeluaranmedia]) VALUES (33, 56, 1, N'FRUITS', CAST(N'2020-02-06' AS Date), CAST(80 AS Decimal(18, 0)), 5, N'', 50, 0, 4, 6, N'1', N'', 0, N'00056_PB330_00033_DS_1B_20200203_T_3NavH', 0, 1, 62)
INSERT [dbo].[karet_initiation] ([id_treatment], [id_reception], [nobox], [sample], [initiation_date], [widthseed], [numberofseeds], [seedcomments], [se], [ze], [initiation_worker], [laminar], [isactive], [treatmentcomment], [remaining_sample], [barcode], [remaining_petri], [idmedia], [idpengeluaranmedia]) VALUES (34, 60, 1, N'FRUITS', CAST(N'2020-03-04' AS Date), CAST(15 AS Decimal(18, 0)), 18, N'', 20, 0, 3, 8, N'1', N'', 0, N'00060_RRIC100_00034_DS_1B_20200304_T_b7wuO', 0, 1, 84)
INSERT [dbo].[karet_initiation] ([id_treatment], [id_reception], [nobox], [sample], [initiation_date], [widthseed], [numberofseeds], [seedcomments], [se], [ze], [initiation_worker], [laminar], [isactive], [treatmentcomment], [remaining_sample], [barcode], [remaining_petri], [idmedia], [idpengeluaranmedia]) VALUES (35, 62, 1, N'FRUITS', CAST(N'2020-03-04' AS Date), CAST(15 AS Decimal(18, 0)), 18, N'', 32, 0, 4, 6, N'1', N'', 0, N'00062_PB260_00035_FF_1B_20200304_T_O354g', 0, 1, 85)
INSERT [dbo].[karet_initiation] ([id_treatment], [id_reception], [nobox], [sample], [initiation_date], [widthseed], [numberofseeds], [seedcomments], [se], [ze], [initiation_worker], [laminar], [isactive], [treatmentcomment], [remaining_sample], [barcode], [remaining_petri], [idmedia], [idpengeluaranmedia]) VALUES (36, 60, 1, N'FRUITS', CAST(N'2020-03-04' AS Date), CAST(15 AS Decimal(18, 0)), 18, N'', 22, 0, 3, 8, N'1', N'', 0, N'00060_RRIC100_00036_DS_1B_20200304_T_JJOXH', 0, 1, 86)
INSERT [dbo].[karet_initiation] ([id_treatment], [id_reception], [nobox], [sample], [initiation_date], [widthseed], [numberofseeds], [seedcomments], [se], [ze], [initiation_worker], [laminar], [isactive], [treatmentcomment], [remaining_sample], [barcode], [remaining_petri], [idmedia], [idpengeluaranmedia]) VALUES (37, 58, 1, N'FRUITS', CAST(N'2020-03-04' AS Date), CAST(15 AS Decimal(18, 0)), 18, N'', 90, 0, 3, 8, N'1', N'', 0, N'00058_PB217_00037_DS_1B_20200304_T_ScvFS', 0, 1, 90)
INSERT [dbo].[karet_initiation] ([id_treatment], [id_reception], [nobox], [sample], [initiation_date], [widthseed], [numberofseeds], [seedcomments], [se], [ze], [initiation_worker], [laminar], [isactive], [treatmentcomment], [remaining_sample], [barcode], [remaining_petri], [idmedia], [idpengeluaranmedia]) VALUES (38, 62, 1, N'FRUITS', CAST(N'2020-03-22' AS Date), CAST(15 AS Decimal(18, 0)), 18, N'', 140, 0, 3, 6, N'1', N'', 0, N'00062_PB260_00038_DS_1B_20200322_T_HrZnI', 0, 1, 97)
INSERT [dbo].[karet_initiation] ([id_treatment], [id_reception], [nobox], [sample], [initiation_date], [widthseed], [numberofseeds], [seedcomments], [se], [ze], [initiation_worker], [laminar], [isactive], [treatmentcomment], [remaining_sample], [barcode], [remaining_petri], [idmedia], [idpengeluaranmedia]) VALUES (39, 65, 1, N'FRUITS', CAST(N'2020-04-02' AS Date), CAST(15 AS Decimal(18, 0)), 18, N'', 0, 0, 3, 8, N'1', N'', 0, N'00065_IRCA41_00039_DS_1B_20200402_T_9Twr6', 22, 1, 1101)
INSERT [dbo].[karet_initiation] ([id_treatment], [id_reception], [nobox], [sample], [initiation_date], [widthseed], [numberofseeds], [seedcomments], [se], [ze], [initiation_worker], [laminar], [isactive], [treatmentcomment], [remaining_sample], [barcode], [remaining_petri], [idmedia], [idpengeluaranmedia]) VALUES (40, 65, 1, N'FRUITS', CAST(N'2020-04-02' AS Date), CAST(15 AS Decimal(18, 0)), 18, N'', 0, 20, 3, 5, N'1', N'', 20, N'00065_IRCA41_00040_DS_1B_20200402_T_kzRxG', 21, 1, 1102)
INSERT [dbo].[karet_initiation] ([id_treatment], [id_reception], [nobox], [sample], [initiation_date], [widthseed], [numberofseeds], [seedcomments], [se], [ze], [initiation_worker], [laminar], [isactive], [treatmentcomment], [remaining_sample], [barcode], [remaining_petri], [idmedia], [idpengeluaranmedia]) VALUES (41, 70, 1, N'FRUITS', CAST(N'2020-04-02' AS Date), CAST(15 AS Decimal(18, 0)), 18, N'', 0, 20, 3, 9, N'1', N'', 0, N'00070_IRCA41_00041_DS_1B_20200402_T_NsoQu', 0, 1, 1103)
INSERT [dbo].[karet_initiation] ([id_treatment], [id_reception], [nobox], [sample], [initiation_date], [widthseed], [numberofseeds], [seedcomments], [se], [ze], [initiation_worker], [laminar], [isactive], [treatmentcomment], [remaining_sample], [barcode], [remaining_petri], [idmedia], [idpengeluaranmedia]) VALUES (42, 69, 1, N'FRUITS', CAST(N'2020-04-05' AS Date), CAST(15 AS Decimal(18, 0)), 18, N'', 0, 20, 4, 8, N'1', N'', 0, N'00069_PB217_00042_FF_1B_20200405_T_6SHUF', 0, 1, 1104)
INSERT [dbo].[karet_initiation] ([id_treatment], [id_reception], [nobox], [sample], [initiation_date], [widthseed], [numberofseeds], [seedcomments], [se], [ze], [initiation_worker], [laminar], [isactive], [treatmentcomment], [remaining_sample], [barcode], [remaining_petri], [idmedia], [idpengeluaranmedia]) VALUES (43, 68, 1, N'FRUITS', CAST(N'2020-04-04' AS Date), CAST(15 AS Decimal(18, 0)), 18, N'', 0, 20, 6, 5, N'1', N'', 0, N'00068_PB217_00043_RS_1B_20200404_T_03EYR', 1, 1, 1105)
INSERT [dbo].[karet_initiation] ([id_treatment], [id_reception], [nobox], [sample], [initiation_date], [widthseed], [numberofseeds], [seedcomments], [se], [ze], [initiation_worker], [laminar], [isactive], [treatmentcomment], [remaining_sample], [barcode], [remaining_petri], [idmedia], [idpengeluaranmedia]) VALUES (44, 67, 1, N'FRUITS', CAST(N'2020-04-05' AS Date), CAST(15 AS Decimal(18, 0)), 18, N'', 0, 20, 4, 9, N'1', N'', 0, N'00067_PB217_00044_FF_1B_20200405_T_z4CVL', 0, 1, 1106)
SET IDENTITY_INSERT [dbo].[karet_initiation] OFF
SET IDENTITY_INSERT [dbo].[karet_initiation_embryo_grow] ON 

INSERT [dbo].[karet_initiation_embryo_grow] ([id], [id_initiation_trans], [id_treatment], [growing_embryo], [remaining_embryo], [isactive]) VALUES (2, 8, 23, 4, 0, 1)
INSERT [dbo].[karet_initiation_embryo_grow] ([id], [id_initiation_trans], [id_treatment], [growing_embryo], [remaining_embryo], [isactive]) VALUES (3, 7, 22, 3, 3, 1)
INSERT [dbo].[karet_initiation_embryo_grow] ([id], [id_initiation_trans], [id_treatment], [growing_embryo], [remaining_embryo], [isactive]) VALUES (4, 3, 21, 1, 1, 1)
INSERT [dbo].[karet_initiation_embryo_grow] ([id], [id_initiation_trans], [id_treatment], [growing_embryo], [remaining_embryo], [isactive]) VALUES (5, 4, 24, 1, 1, 1)
INSERT [dbo].[karet_initiation_embryo_grow] ([id], [id_initiation_trans], [id_treatment], [growing_embryo], [remaining_embryo], [isactive]) VALUES (6, 9, 24, 1, 0, 1)
INSERT [dbo].[karet_initiation_embryo_grow] ([id], [id_initiation_trans], [id_treatment], [growing_embryo], [remaining_embryo], [isactive]) VALUES (7, 10, 31, 1, 0, 1)
INSERT [dbo].[karet_initiation_embryo_grow] ([id], [id_initiation_trans], [id_treatment], [growing_embryo], [remaining_embryo], [isactive]) VALUES (8, 12, 34, 2, 1, 1)
INSERT [dbo].[karet_initiation_embryo_grow] ([id], [id_initiation_trans], [id_treatment], [growing_embryo], [remaining_embryo], [isactive]) VALUES (9, 13, 35, 2, 1, 1)
INSERT [dbo].[karet_initiation_embryo_grow] ([id], [id_initiation_trans], [id_treatment], [growing_embryo], [remaining_embryo], [isactive]) VALUES (10, 14, 36, 3, 3, 1)
INSERT [dbo].[karet_initiation_embryo_grow] ([id], [id_initiation_trans], [id_treatment], [growing_embryo], [remaining_embryo], [isactive]) VALUES (11, 36, 0, 20, 20, 1)
INSERT [dbo].[karet_initiation_embryo_grow] ([id], [id_initiation_trans], [id_treatment], [growing_embryo], [remaining_embryo], [isactive]) VALUES (12, 15, 37, 11, 9, 1)
INSERT [dbo].[karet_initiation_embryo_grow] ([id], [id_initiation_trans], [id_treatment], [growing_embryo], [remaining_embryo], [isactive]) VALUES (13, 16, 41, 3, 1, 1)
INSERT [dbo].[karet_initiation_embryo_grow] ([id], [id_initiation_trans], [id_treatment], [growing_embryo], [remaining_embryo], [isactive]) VALUES (14, 17, 44, 11, 6, 1)
INSERT [dbo].[karet_initiation_embryo_grow] ([id], [id_initiation_trans], [id_treatment], [growing_embryo], [remaining_embryo], [isactive]) VALUES (15, 18, 42, 10, 10, 1)
SET IDENTITY_INSERT [dbo].[karet_initiation_embryo_grow] OFF
SET IDENTITY_INSERT [dbo].[karet_initiation_embryo_screening] ON 

INSERT [dbo].[karet_initiation_embryo_screening] ([id], [id_treatment], [screening_date], [screening_worker], [isactive], [grow_embryo], [screening_checkpoint], [comment], [idcontaminationrecord], [id_initiation_trans]) VALUES (7, 23, CAST(N'2020-01-17' AS Date), 4, 1, 0, 1, N'Nothing', 23, 8)
INSERT [dbo].[karet_initiation_embryo_screening] ([id], [id_treatment], [screening_date], [screening_worker], [isactive], [grow_embryo], [screening_checkpoint], [comment], [idcontaminationrecord], [id_initiation_trans]) VALUES (8, 23, CAST(N'2020-01-22' AS Date), 4, 1, 1, 2, N'One Embryo', 24, 8)
INSERT [dbo].[karet_initiation_embryo_screening] ([id], [id_treatment], [screening_date], [screening_worker], [isactive], [grow_embryo], [screening_checkpoint], [comment], [idcontaminationrecord], [id_initiation_trans]) VALUES (9, 23, CAST(N'2020-01-23' AS Date), 3, 1, 2, 3, N'Two Embryo', 25, 8)
INSERT [dbo].[karet_initiation_embryo_screening] ([id], [id_treatment], [screening_date], [screening_worker], [isactive], [grow_embryo], [screening_checkpoint], [comment], [idcontaminationrecord], [id_initiation_trans]) VALUES (10, 23, CAST(N'2020-01-24' AS Date), 4, 1, 1, 4, N'Embryo', 26, 8)
INSERT [dbo].[karet_initiation_embryo_screening] ([id], [id_treatment], [screening_date], [screening_worker], [isactive], [grow_embryo], [screening_checkpoint], [comment], [idcontaminationrecord], [id_initiation_trans]) VALUES (11, 22, CAST(N'2020-01-01' AS Date), 3, 1, 0, 1, N'', 27, 7)
INSERT [dbo].[karet_initiation_embryo_screening] ([id], [id_treatment], [screening_date], [screening_worker], [isactive], [grow_embryo], [screening_checkpoint], [comment], [idcontaminationrecord], [id_initiation_trans]) VALUES (12, 22, CAST(N'2020-01-15' AS Date), 4, 1, 1, 2, N'One embryo', 28, 7)
INSERT [dbo].[karet_initiation_embryo_screening] ([id], [id_treatment], [screening_date], [screening_worker], [isactive], [grow_embryo], [screening_checkpoint], [comment], [idcontaminationrecord], [id_initiation_trans]) VALUES (13, 22, CAST(N'2020-01-23' AS Date), 4, 1, 2, 3, N'', 29, 7)
INSERT [dbo].[karet_initiation_embryo_screening] ([id], [id_treatment], [screening_date], [screening_worker], [isactive], [grow_embryo], [screening_checkpoint], [comment], [idcontaminationrecord], [id_initiation_trans]) VALUES (14, 21, CAST(N'2020-01-08' AS Date), 4, 1, 1, 1, N'', 30, 3)
INSERT [dbo].[karet_initiation_embryo_screening] ([id], [id_treatment], [screening_date], [screening_worker], [isactive], [grow_embryo], [screening_checkpoint], [comment], [idcontaminationrecord], [id_initiation_trans]) VALUES (15, 24, CAST(N'2020-01-24' AS Date), 3, 1, 1, 1, N'1 embryo grow', 36, 4)
INSERT [dbo].[karet_initiation_embryo_screening] ([id], [id_treatment], [screening_date], [screening_worker], [isactive], [grow_embryo], [screening_checkpoint], [comment], [idcontaminationrecord], [id_initiation_trans]) VALUES (16, 24, CAST(N'2020-01-31' AS Date), 2, 1, 1, 1, N'', 41, 9)
INSERT [dbo].[karet_initiation_embryo_screening] ([id], [id_treatment], [screening_date], [screening_worker], [isactive], [grow_embryo], [screening_checkpoint], [comment], [idcontaminationrecord], [id_initiation_trans]) VALUES (17, 31, CAST(N'2020-02-07' AS Date), 2, 1, 1, 1, N'', 44, 10)
INSERT [dbo].[karet_initiation_embryo_screening] ([id], [id_treatment], [screening_date], [screening_worker], [isactive], [grow_embryo], [screening_checkpoint], [comment], [idcontaminationrecord], [id_initiation_trans]) VALUES (18, 34, CAST(N'2020-03-04' AS Date), 4, 1, 1, 1, N'', 60, 12)
INSERT [dbo].[karet_initiation_embryo_screening] ([id], [id_treatment], [screening_date], [screening_worker], [isactive], [grow_embryo], [screening_checkpoint], [comment], [idcontaminationrecord], [id_initiation_trans]) VALUES (19, 34, CAST(N'2020-03-05' AS Date), 7, 1, 1, 2, N'', 61, 12)
INSERT [dbo].[karet_initiation_embryo_screening] ([id], [id_treatment], [screening_date], [screening_worker], [isactive], [grow_embryo], [screening_checkpoint], [comment], [idcontaminationrecord], [id_initiation_trans]) VALUES (20, 35, CAST(N'2020-03-04' AS Date), 3, 1, 2, 1, N'', 62, 13)
INSERT [dbo].[karet_initiation_embryo_screening] ([id], [id_treatment], [screening_date], [screening_worker], [isactive], [grow_embryo], [screening_checkpoint], [comment], [idcontaminationrecord], [id_initiation_trans]) VALUES (21, 36, CAST(N'2020-04-04' AS Date), 2, 1, 3, 1, N'', 63, 14)
INSERT [dbo].[karet_initiation_embryo_screening] ([id], [id_treatment], [screening_date], [screening_worker], [isactive], [grow_embryo], [screening_checkpoint], [comment], [idcontaminationrecord], [id_initiation_trans]) VALUES (22, 0, CAST(N'2020-03-20' AS Date), 3, 1, 20, 1, N'', 73, 36)
INSERT [dbo].[karet_initiation_embryo_screening] ([id], [id_treatment], [screening_date], [screening_worker], [isactive], [grow_embryo], [screening_checkpoint], [comment], [idcontaminationrecord], [id_initiation_trans]) VALUES (23, 37, CAST(N'2020-03-22' AS Date), 3, 1, 11, 1, N'', 76, 15)
INSERT [dbo].[karet_initiation_embryo_screening] ([id], [id_treatment], [screening_date], [screening_worker], [isactive], [grow_embryo], [screening_checkpoint], [comment], [idcontaminationrecord], [id_initiation_trans]) VALUES (24, 41, CAST(N'2020-04-02' AS Date), 1, 1, 3, 1, N'', 84, 16)
INSERT [dbo].[karet_initiation_embryo_screening] ([id], [id_treatment], [screening_date], [screening_worker], [isactive], [grow_embryo], [screening_checkpoint], [comment], [idcontaminationrecord], [id_initiation_trans]) VALUES (25, 44, CAST(N'2020-04-02' AS Date), 2, 1, 11, 1, N'', 85, 17)
INSERT [dbo].[karet_initiation_embryo_screening] ([id], [id_treatment], [screening_date], [screening_worker], [isactive], [grow_embryo], [screening_checkpoint], [comment], [idcontaminationrecord], [id_initiation_trans]) VALUES (26, 42, CAST(N'2020-04-02' AS Date), 4, 1, 10, 1, N'', 91, 18)
SET IDENTITY_INSERT [dbo].[karet_initiation_embryo_screening] OFF
SET IDENTITY_INSERT [dbo].[karet_initiation_obs] ON 

INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (25, 21, CAST(N'2020-01-15' AS Date), 4, 25, 35, 40, 20, 0, 0, 0, 30, 1, 14, 0)
INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (26, 21, CAST(N'2020-01-16' AS Date), 4, 5, 10, 13, 0, 2, 0, 0, 15, 1, 15, 0)
INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (28, 21, CAST(N'2020-01-16' AS Date), 4, 7, 8, 2, 0, 7, 6, 0, 0, 1, 16, 0)
INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (29, 22, CAST(N'2020-01-15' AS Date), 2, 80, 20, 20, 50, 30, 0, 0, 50, 1, 17, 0)
INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (30, 24, CAST(N'2020-01-16' AS Date), 4, 30, 10, 20, 0, 10, 10, 0, 10, 1, 18, 0)
INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (31, 22, CAST(N'2020-01-01' AS Date), 4, 25, 10, 10, 10, 5, 10, 0, 15, 1, 19, 0)
INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (32, 22, CAST(N'2020-01-22' AS Date), 3, 5, 10, 2, 8, 3, 2, 0, 0, 1, 20, 0)
INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (33, 23, CAST(N'2020-01-15' AS Date), 4, 28, 15, 5, 10, 20, 8, 0, 35, 1, 21, 0)
INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (34, 24, CAST(N'2020-01-24' AS Date), 2, 3, 7, 0, 4, 6, 0, 0, 0, 1, 40, 0)
INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (35, 31, CAST(N'2020-02-07' AS Date), 2, 15, 15, 0, 15, 15, 0, 0, 50, 1, 43, 0)
INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (36, 31, CAST(N'2020-02-14' AS Date), 6, 35, 15, 5, 10, 25, 10, 0, 0, 1, 48, 0)
INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (37, 34, CAST(N'2020-03-04' AS Date), 4, 10, 10, 20, 0, 0, 0, 0, 0, 1, 57, 0)
INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (38, 35, CAST(N'2020-03-04' AS Date), 4, 2, 30, 32, 0, 0, 0, 0, 0, 1, 58, 0)
INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (39, 36, CAST(N'2020-03-04' AS Date), 6, 22, 0, 22, 0, 0, 0, 0, 0, 1, 59, 0)
INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (40, 33, CAST(N'2020-03-04' AS Date), 4, 5, 0, 5, 0, 0, 0, 0, 0, 1, 64, 1)
INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (41, 37, CAST(N'2020-03-20' AS Date), 7, 20, 10, 10, 0, 20, 0, 0, 0, 1, 74, 0)
INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (42, 38, CAST(N'2020-03-22' AS Date), 4, 22, 10, 22, 0, 10, 0, 0, 0, 1, 75, 1)
INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (43, 41, CAST(N'2020-04-02' AS Date), 6, 1, 1, 2, 0, 0, 0, 0, 0, 1, 82, 0)
INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (44, 44, CAST(N'2020-04-02' AS Date), 3, 5, 5, 10, 0, 0, 0, 0, 0, 1, 83, 0)
INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (45, 42, CAST(N'2020-04-02' AS Date), 3, 15, 0, 15, 0, 0, 0, 0, 0, 1, 90, 0)
INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (46, 43, CAST(N'2020-04-02' AS Date), 3, 12, 1, 13, 0, 0, 0, 0, 0, 1, 103, 0)
INSERT [dbo].[karet_initiation_obs] ([id], [id_treatment], [obsdate], [obsworker], [alotofcallus], [littlebitofcallus], [yellow], [white], [orange], [brown], [dead], [piecesnotreact], [isactive], [idcontaminationrecord], [isavailable]) VALUES (47, 23, CAST(N'2020-04-19' AS Date), 3, 10, 20, 0, 10, 10, 10, 0, 5, 1, 104, 0)
SET IDENTITY_INSERT [dbo].[karet_initiation_obs] OFF
SET IDENTITY_INSERT [dbo].[karet_initiation_trans] ON 

INSERT [dbo].[karet_initiation_trans] ([id], [id_treatment], [callustransfer], [transferdate], [transferworker], [comment], [isactive], [barcode], [isavailable], [laminar], [idmedia], [idpengeluaranmedia]) VALUES (2, 21, 75, CAST(N'2020-01-15' AS Date), 2, N'', 0, N'00001_PB260_00021_IS_2_20200115_T', 1, 5, NULL, NULL)
INSERT [dbo].[karet_initiation_trans] ([id], [id_treatment], [callustransfer], [transferdate], [transferworker], [comment], [isactive], [barcode], [isavailable], [laminar], [idmedia], [idpengeluaranmedia]) VALUES (3, 21, 15, CAST(N'2020-01-16' AS Date), 4, N'', 1, N'00001_PB260_00021_RAN_2_20200116_T', NULL, 5, NULL, NULL)
INSERT [dbo].[karet_initiation_trans] ([id], [id_treatment], [callustransfer], [transferdate], [transferworker], [comment], [isactive], [barcode], [isavailable], [laminar], [idmedia], [idpengeluaranmedia]) VALUES (4, 24, 40, CAST(N'2020-01-16' AS Date), 4, N'', 1, N'00054_RRIC100_00024_RAN_2_20200116_T', NULL, 6, NULL, NULL)
INSERT [dbo].[karet_initiation_trans] ([id], [id_treatment], [callustransfer], [transferdate], [transferworker], [comment], [isactive], [barcode], [isavailable], [laminar], [idmedia], [idpengeluaranmedia]) VALUES (5, 22, 100, CAST(N'2020-01-15' AS Date), 3, N'', 1, N'00002_PB260_00022_BS__20200115_T_efNj3', NULL, 6, 2, NULL)
INSERT [dbo].[karet_initiation_trans] ([id], [id_treatment], [callustransfer], [transferdate], [transferworker], [comment], [isactive], [barcode], [isavailable], [laminar], [idmedia], [idpengeluaranmedia]) VALUES (6, 22, 35, CAST(N'2020-01-15' AS Date), 4, N'', 1, N'00002_PB260_00022_RAN__20200115_T_4wsUX', NULL, 5, 2, NULL)
INSERT [dbo].[karet_initiation_trans] ([id], [id_treatment], [callustransfer], [transferdate], [transferworker], [comment], [isactive], [barcode], [isavailable], [laminar], [idmedia], [idpengeluaranmedia]) VALUES (7, 22, 15, CAST(N'2020-01-17' AS Date), 3, N'', 1, N'00002_PB260_00022_BS_2_20200117_T_RkGAR', NULL, 2, 2, NULL)
INSERT [dbo].[karet_initiation_trans] ([id], [id_treatment], [callustransfer], [transferdate], [transferworker], [comment], [isactive], [barcode], [isavailable], [laminar], [idmedia], [idpengeluaranmedia]) VALUES (8, 23, 40, CAST(N'2020-01-22' AS Date), 3, N'', 1, N'00053_PB217_00023_BS_2_20200122_T_RPoi3', NULL, 5, 2, NULL)
INSERT [dbo].[karet_initiation_trans] ([id], [id_treatment], [callustransfer], [transferdate], [transferworker], [comment], [isactive], [barcode], [isavailable], [laminar], [idmedia], [idpengeluaranmedia]) VALUES (9, 24, 10, CAST(N'2020-01-24' AS Date), 6, N'', 1, N'00054_RRIC100_00024_RS_2_20200124_T_K7v0s', NULL, 2, 2, NULL)
INSERT [dbo].[karet_initiation_trans] ([id], [id_treatment], [callustransfer], [transferdate], [transferworker], [comment], [isactive], [barcode], [isavailable], [laminar], [idmedia], [idpengeluaranmedia]) VALUES (10, 31, 30, CAST(N'2020-02-07' AS Date), 2, N'', 1, N'00055_RRIC100_00031_DR_2_20200207_T_cOLlP', NULL, 6, 2, NULL)
INSERT [dbo].[karet_initiation_trans] ([id], [id_treatment], [callustransfer], [transferdate], [transferworker], [comment], [isactive], [barcode], [isavailable], [laminar], [idmedia], [idpengeluaranmedia]) VALUES (11, 31, 50, CAST(N'2020-02-17' AS Date), 3, N'', 1, N'00055_RRIC100_00031_DR_2_20200219_T_LGIAs', NULL, 5, 2, 63)
INSERT [dbo].[karet_initiation_trans] ([id], [id_treatment], [callustransfer], [transferdate], [transferworker], [comment], [isactive], [barcode], [isavailable], [laminar], [idmedia], [idpengeluaranmedia]) VALUES (12, 34, 20, CAST(N'2020-03-04' AS Date), 3, N'', 1, N'00060_RRIC100_00034_DS_2_20200304_T_h8PSW', NULL, 6, 2, 87)
INSERT [dbo].[karet_initiation_trans] ([id], [id_treatment], [callustransfer], [transferdate], [transferworker], [comment], [isactive], [barcode], [isavailable], [laminar], [idmedia], [idpengeluaranmedia]) VALUES (13, 35, 32, CAST(N'2020-03-04' AS Date), 3, N'', 1, N'00062_PB260_00035_DS_2_20200304_T_v9OVW', NULL, 6, 2, 88)
INSERT [dbo].[karet_initiation_trans] ([id], [id_treatment], [callustransfer], [transferdate], [transferworker], [comment], [isactive], [barcode], [isavailable], [laminar], [idmedia], [idpengeluaranmedia]) VALUES (14, 36, 22, CAST(N'2020-03-04' AS Date), 7, N'', 1, N'00060_RRIC100_00036_AR_2_20200304_T_mcdCk', NULL, 6, 2, 89)
INSERT [dbo].[karet_initiation_trans] ([id], [id_treatment], [callustransfer], [transferdate], [transferworker], [comment], [isactive], [barcode], [isavailable], [laminar], [idmedia], [idpengeluaranmedia]) VALUES (15, 37, 30, CAST(N'2020-03-21' AS Date), 4, N'', 1, N'00058_PB217_00037_FF_2_20200321_T_YnRM6', NULL, 8, 2, 96)
INSERT [dbo].[karet_initiation_trans] ([id], [id_treatment], [callustransfer], [transferdate], [transferworker], [comment], [isactive], [barcode], [isavailable], [laminar], [idmedia], [idpengeluaranmedia]) VALUES (16, 41, 2, CAST(N'2020-04-02' AS Date), 1, N'', 1, N'00070_IRCA41_00041_RL_2_20200402_T_yAT48', NULL, 8, 2, 1107)
INSERT [dbo].[karet_initiation_trans] ([id], [id_treatment], [callustransfer], [transferdate], [transferworker], [comment], [isactive], [barcode], [isavailable], [laminar], [idmedia], [idpengeluaranmedia]) VALUES (17, 44, 10, CAST(N'2020-04-02' AS Date), 4, N'', 1, N'00067_PB217_00044_FF_2_20200402_T_ZwqYF', NULL, 8, 2, 1108)
INSERT [dbo].[karet_initiation_trans] ([id], [id_treatment], [callustransfer], [transferdate], [transferworker], [comment], [isactive], [barcode], [isavailable], [laminar], [idmedia], [idpengeluaranmedia]) VALUES (18, 42, 15, CAST(N'2020-04-02' AS Date), 4, N'', 1, N'00069_PB217_00042_FF_2_20200402_T_xlSWF', NULL, 8, 2, 1109)
INSERT [dbo].[karet_initiation_trans] ([id], [id_treatment], [callustransfer], [transferdate], [transferworker], [comment], [isactive], [barcode], [isavailable], [laminar], [idmedia], [idpengeluaranmedia]) VALUES (19, 43, 13, CAST(N'2020-04-02' AS Date), 2, N'', 1, N'00068_PB217_00043_DR_2_20200402_T_5Gagv', NULL, 5, 2, 1119)
INSERT [dbo].[karet_initiation_trans] ([id], [id_treatment], [callustransfer], [transferdate], [transferworker], [comment], [isactive], [barcode], [isavailable], [laminar], [idmedia], [idpengeluaranmedia]) VALUES (20, 23, 30, CAST(N'2020-04-19' AS Date), 3, N'id treatment 23 has transfered', 1, N'00053_PB217_00023_DS_2_20200419_T_Q5RwL', NULL, 6, 2, 1122)
SET IDENTITY_INSERT [dbo].[karet_initiation_trans] OFF
SET IDENTITY_INSERT [dbo].[karet_laminar] ON 

INSERT [dbo].[karet_laminar] ([id], [nolaminar], [cleaningdate], [datetoclean], [isactive], [description]) VALUES (1, N'04', CAST(N'2018-11-07' AS Date), CAST(N'2018-11-07' AS Date), N'0', N'<p>karet</p>')
INSERT [dbo].[karet_laminar] ([id], [nolaminar], [cleaningdate], [datetoclean], [isactive], [description]) VALUES (2, N'03', CAST(N'2019-06-12' AS Date), CAST(N'2019-07-12' AS Date), N'1', N'Karet')
INSERT [dbo].[karet_laminar] ([id], [nolaminar], [cleaningdate], [datetoclean], [isactive], [description]) VALUES (3, N'm', CAST(N'2019-06-12' AS Date), CAST(N'2019-06-12' AS Date), N'0', N'<p>sawit</p>')
INSERT [dbo].[karet_laminar] ([id], [nolaminar], [cleaningdate], [datetoclean], [isactive], [description]) VALUES (4, N'54', CAST(N'2019-06-14' AS Date), CAST(N'2019-06-19' AS Date), N'0', NULL)
INSERT [dbo].[karet_laminar] ([id], [nolaminar], [cleaningdate], [datetoclean], [isactive], [description]) VALUES (5, N'M', CAST(N'2019-06-15' AS Date), CAST(N'2019-07-15' AS Date), N'1', NULL)
INSERT [dbo].[karet_laminar] ([id], [nolaminar], [cleaningdate], [datetoclean], [isactive], [description]) VALUES (6, N'3/4', CAST(N'2019-06-15' AS Date), CAST(N'2019-07-15' AS Date), N'1', NULL)
INSERT [dbo].[karet_laminar] ([id], [nolaminar], [cleaningdate], [datetoclean], [isactive], [description]) VALUES (7, N'M/J/K/L/N', CAST(N'2019-06-15' AS Date), CAST(N'2019-07-15' AS Date), N'0', NULL)
INSERT [dbo].[karet_laminar] ([id], [nolaminar], [cleaningdate], [datetoclean], [isactive], [description]) VALUES (8, N'04', CAST(N'2019-06-15' AS Date), CAST(N'2019-06-15' AS Date), N'1', NULL)
INSERT [dbo].[karet_laminar] ([id], [nolaminar], [cleaningdate], [datetoclean], [isactive], [description]) VALUES (9, N'J', CAST(N'2019-07-02' AS Date), CAST(N'2019-06-15' AS Date), N'1', NULL)
INSERT [dbo].[karet_laminar] ([id], [nolaminar], [cleaningdate], [datetoclean], [isactive], [description]) VALUES (10, N'K', CAST(N'2019-06-15' AS Date), CAST(N'2019-06-15' AS Date), N'1', NULL)
INSERT [dbo].[karet_laminar] ([id], [nolaminar], [cleaningdate], [datetoclean], [isactive], [description]) VALUES (11, N'L', CAST(N'2019-06-15' AS Date), CAST(N'2019-06-15' AS Date), N'1', NULL)
INSERT [dbo].[karet_laminar] ([id], [nolaminar], [cleaningdate], [datetoclean], [isactive], [description]) VALUES (12, N'N', CAST(N'2019-06-15' AS Date), CAST(N'2019-06-15' AS Date), N'1', NULL)
INSERT [dbo].[karet_laminar] ([id], [nolaminar], [cleaningdate], [datetoclean], [isactive], [description]) VALUES (13, N'O', CAST(N'2019-06-15' AS Date), CAST(N'2019-06-15' AS Date), N'1', NULL)
INSERT [dbo].[karet_laminar] ([id], [nolaminar], [cleaningdate], [datetoclean], [isactive], [description]) VALUES (14, N'P', CAST(N'2019-06-15' AS Date), CAST(N'2019-06-15' AS Date), N'1', NULL)
INSERT [dbo].[karet_laminar] ([id], [nolaminar], [cleaningdate], [datetoclean], [isactive], [description]) VALUES (15, N'Q', CAST(N'2019-06-15' AS Date), CAST(N'2019-06-15' AS Date), N'1', NULL)
INSERT [dbo].[karet_laminar] ([id], [nolaminar], [cleaningdate], [datetoclean], [isactive], [description]) VALUES (16, N'03/04/K', CAST(N'2019-06-15' AS Date), CAST(N'2019-06-15' AS Date), N'1', NULL)
INSERT [dbo].[karet_laminar] ([id], [nolaminar], [cleaningdate], [datetoclean], [isactive], [description]) VALUES (17, N'12334', CAST(N'2019-11-03' AS Date), CAST(N'2019-11-21' AS Date), N'0', N'BlaBlaBla')
INSERT [dbo].[karet_laminar] ([id], [nolaminar], [cleaningdate], [datetoclean], [isactive], [description]) VALUES (18, N'Z1', CAST(N'2020-04-06' AS Date), CAST(N'2020-05-15' AS Date), N'1', N'test asdas dasd asd asdasd asda')
SET IDENTITY_INSERT [dbo].[karet_laminar] OFF
SET IDENTITY_INSERT [dbo].[karet_media] ON 

INSERT [dbo].[karet_media] ([id], [mediacode], [description], [stok], [isactive], [id_jenis_media], [id_media_type]) VALUES (1, N'1B', N'Media Tahap 1', 49701, N'1', 1, NULL)
INSERT [dbo].[karet_media] ([id], [mediacode], [description], [stok], [isactive], [id_jenis_media], [id_media_type]) VALUES (2, N'2', N'<p>Media tahap 2&nbsp;</p>', 49975, N'1', 2, NULL)
INSERT [dbo].[karet_media] ([id], [mediacode], [description], [stok], [isactive], [id_jenis_media], [id_media_type]) VALUES (3, N'3', N'<p>Media tahap 3</p>', 50009, N'1', 3, NULL)
INSERT [dbo].[karet_media] ([id], [mediacode], [description], [stok], [isactive], [id_jenis_media], [id_media_type]) VALUES (4, N'4', N'<p>Media tahap 4</p>', 49990, N'1', 4, NULL)
INSERT [dbo].[karet_media] ([id], [mediacode], [description], [stok], [isactive], [id_jenis_media], [id_media_type]) VALUES (5, N'5', N'<p>Media tahap 5</p>', 1657, N'1', 5, NULL)
INSERT [dbo].[karet_media] ([id], [mediacode], [description], [stok], [isactive], [id_jenis_media], [id_media_type]) VALUES (6, N'M', N'<p>Shoot</p>', NULL, N'1', 6, NULL)
INSERT [dbo].[karet_media] ([id], [mediacode], [description], [stok], [isactive], [id_jenis_media], [id_media_type]) VALUES (7, N'B', N'<p>Perbanyakan</p>', NULL, N'1', 7, NULL)
INSERT [dbo].[karet_media] ([id], [mediacode], [description], [stok], [isactive], [id_jenis_media], [id_media_type]) VALUES (8, N'B2HL', N'<p>Pre Aklim</p>', NULL, N'1', 8, NULL)
INSERT [dbo].[karet_media] ([id], [mediacode], [description], [stok], [isactive], [id_jenis_media], [id_media_type]) VALUES (12, N'1A', N'<p>aklim</p>', NULL, N'0', 7, NULL)
INSERT [dbo].[karet_media] ([id], [mediacode], [description], [stok], [isactive], [id_jenis_media], [id_media_type]) VALUES (13, N'1A', N'<p>Inisiasi</p>', 5, N'1', 1, NULL)
INSERT [dbo].[karet_media] ([id], [mediacode], [description], [stok], [isactive], [id_jenis_media], [id_media_type]) VALUES (14, N'FD', NULL, NULL, N'0', 4, NULL)
INSERT [dbo].[karet_media] ([id], [mediacode], [description], [stok], [isactive], [id_jenis_media], [id_media_type]) VALUES (15, N'2A', NULL, NULL, N'0', 3, NULL)
INSERT [dbo].[karet_media] ([id], [mediacode], [description], [stok], [isactive], [id_jenis_media], [id_media_type]) VALUES (16, N'5A', NULL, NULL, N'0', 5, NULL)
INSERT [dbo].[karet_media] ([id], [mediacode], [description], [stok], [isactive], [id_jenis_media], [id_media_type]) VALUES (17, N'2A/2B/2C', N'', NULL, N'1', 2, NULL)
INSERT [dbo].[karet_media] ([id], [mediacode], [description], [stok], [isactive], [id_jenis_media], [id_media_type]) VALUES (18, N'34', N'<p>34</p>', NULL, N'1', 3, NULL)
INSERT [dbo].[karet_media] ([id], [mediacode], [description], [stok], [isactive], [id_jenis_media], [id_media_type]) VALUES (19, N'1C', N'<p>1C</p>', NULL, N'1', 1, NULL)
INSERT [dbo].[karet_media] ([id], [mediacode], [description], [stok], [isactive], [id_jenis_media], [id_media_type]) VALUES (22, N'ASA', N'', NULL, N'1', 1, NULL)
INSERT [dbo].[karet_media] ([id], [mediacode], [description], [stok], [isactive], [id_jenis_media], [id_media_type]) VALUES (23, N'FG1L', N'Aasdasdasdsadasd', NULL, N'1', 2, NULL)
INSERT [dbo].[karet_media] ([id], [mediacode], [description], [stok], [isactive], [id_jenis_media], [id_media_type]) VALUES (24, N'1AAAA', N'Blablabla blahbalhas', NULL, N'0', 1, NULL)
SET IDENTITY_INSERT [dbo].[karet_media] OFF
SET IDENTITY_INSERT [dbo].[karet_media_pembuatan] ON 

INSERT [dbo].[karet_media_pembuatan] ([id], [idmedia], [tglpembuatanmedia], [idworker], [volume], [idvessel], [jumlah], [isactive], [remaining_media], [is_expired], [barcode], [is_remove], [lamakerja]) VALUES (27, 1, CAST(N'2020-01-01' AS Date), 4, 1, 3, 10, N'1', 0, 0, N'WMIONPS4AR', 0, N'60')
INSERT [dbo].[karet_media_pembuatan] ([id], [idmedia], [tglpembuatanmedia], [idworker], [volume], [idvessel], [jumlah], [isactive], [remaining_media], [is_expired], [barcode], [is_remove], [lamakerja]) VALUES (28, 1, CAST(N'2020-01-08' AS Date), 3, 1.5, 3, 15, N'1', 0, 0, N'BPXC2P1CBN', 0, N'60')
INSERT [dbo].[karet_media_pembuatan] ([id], [idmedia], [tglpembuatanmedia], [idworker], [volume], [idvessel], [jumlah], [isactive], [remaining_media], [is_expired], [barcode], [is_remove], [lamakerja]) VALUES (29, 1, CAST(N'2019-12-31' AS Date), 4, 1, 3, 10, N'0', 9, 1, N'HSJ04NQ4TQ', 1, N'60')
INSERT [dbo].[karet_media_pembuatan] ([id], [idmedia], [tglpembuatanmedia], [idworker], [volume], [idvessel], [jumlah], [isactive], [remaining_media], [is_expired], [barcode], [is_remove], [lamakerja]) VALUES (30, 13, CAST(N'2019-12-20' AS Date), 3, 0.5, 3, 5, N'1', NULL, 0, N'GRDUVWVMRL', 0, N'60')
INSERT [dbo].[karet_media_pembuatan] ([id], [idmedia], [tglpembuatanmedia], [idworker], [volume], [idvessel], [jumlah], [isactive], [remaining_media], [is_expired], [barcode], [is_remove], [lamakerja]) VALUES (31, 2, CAST(N'2020-01-08' AS Date), 4, 1, 3, 10, N'1', 0, 0, N'B5WDJ2Z16J', 0, N'60')
INSERT [dbo].[karet_media_pembuatan] ([id], [idmedia], [tglpembuatanmedia], [idworker], [volume], [idvessel], [jumlah], [isactive], [remaining_media], [is_expired], [barcode], [is_remove], [lamakerja]) VALUES (32, 2, CAST(N'2020-01-08' AS Date), 3, 1, 3, 10, N'1', 0, 0, N'APvA51pc24', 0, N'60')
INSERT [dbo].[karet_media_pembuatan] ([id], [idmedia], [tglpembuatanmedia], [idworker], [volume], [idvessel], [jumlah], [isactive], [remaining_media], [is_expired], [barcode], [is_remove], [lamakerja]) VALUES (33, 2, CAST(N'2020-01-09' AS Date), 4, 0.5, 3, 5, N'1', 0, 0, N'n1wLiegqQL', 1, N'60')
INSERT [dbo].[karet_media_pembuatan] ([id], [idmedia], [tglpembuatanmedia], [idworker], [volume], [idvessel], [jumlah], [isactive], [remaining_media], [is_expired], [barcode], [is_remove], [lamakerja]) VALUES (34, 3, CAST(N'2020-01-15' AS Date), 4, 0.5, 3, 5, N'0', 5, 0, N'4NzeagmYE1', 0, N'60')
INSERT [dbo].[karet_media_pembuatan] ([id], [idmedia], [tglpembuatanmedia], [idworker], [volume], [idvessel], [jumlah], [isactive], [remaining_media], [is_expired], [barcode], [is_remove], [lamakerja]) VALUES (35, 4, CAST(N'2020-01-17' AS Date), 4, 0.5, 3, 5, N'0', 3, 0, N'WF8kJRsoDZ', 0, N'60')
INSERT [dbo].[karet_media_pembuatan] ([id], [idmedia], [tglpembuatanmedia], [idworker], [volume], [idvessel], [jumlah], [isactive], [remaining_media], [is_expired], [barcode], [is_remove], [lamakerja]) VALUES (36, 5, CAST(N'2020-02-06' AS Date), 2, 0.1, 4, 1, N'1', 0, 0, N'jTyDJvisAo', 0, N'15')
INSERT [dbo].[karet_media_pembuatan] ([id], [idmedia], [tglpembuatanmedia], [idworker], [volume], [idvessel], [jumlah], [isactive], [remaining_media], [is_expired], [barcode], [is_remove], [lamakerja]) VALUES (39, 5, CAST(N'2020-02-05' AS Date), 3, 0.5, 4, 5, N'1', 0, 0, N'wD7K8JkUwM', 0, N'30')
INSERT [dbo].[karet_media_pembuatan] ([id], [idmedia], [tglpembuatanmedia], [idworker], [volume], [idvessel], [jumlah], [isactive], [remaining_media], [is_expired], [barcode], [is_remove], [lamakerja]) VALUES (40, 1, CAST(N'2020-02-10' AS Date), 3, 10, 3, 10, N'1', 0, 0, N'abrUDXrP8W', 0, N'60')
INSERT [dbo].[karet_media_pembuatan] ([id], [idmedia], [tglpembuatanmedia], [idworker], [volume], [idvessel], [jumlah], [isactive], [remaining_media], [is_expired], [barcode], [is_remove], [lamakerja]) VALUES (41, 13, CAST(N'2020-02-11' AS Date), 2, 1, 3, 10, N'1', 5, 0, N'exrHFCI89S', 0, N'60')
INSERT [dbo].[karet_media_pembuatan] ([id], [idmedia], [tglpembuatanmedia], [idworker], [volume], [idvessel], [jumlah], [isactive], [remaining_media], [is_expired], [barcode], [is_remove], [lamakerja]) VALUES (42, 2, CAST(N'2020-02-19' AS Date), 3, 1, 6, 10, N'1', 0, 0, N'xrJ3TLdcav', 0, N'60')
INSERT [dbo].[karet_media_pembuatan] ([id], [idmedia], [tglpembuatanmedia], [idworker], [volume], [idvessel], [jumlah], [isactive], [remaining_media], [is_expired], [barcode], [is_remove], [lamakerja]) VALUES (43, 3, CAST(N'2020-02-20' AS Date), 2, 1, 3, 10, N'1', 9, 0, N'GaozUzl8TA', 0, N'60')
INSERT [dbo].[karet_media_pembuatan] ([id], [idmedia], [tglpembuatanmedia], [idworker], [volume], [idvessel], [jumlah], [isactive], [remaining_media], [is_expired], [barcode], [is_remove], [lamakerja]) VALUES (44, 4, CAST(N'2020-02-19' AS Date), 2, 0.2, 3, 2, N'1', 0, 0, N'Jj53fxNpUO', 0, N'15')
INSERT [dbo].[karet_media_pembuatan] ([id], [idmedia], [tglpembuatanmedia], [idworker], [volume], [idvessel], [jumlah], [isactive], [remaining_media], [is_expired], [barcode], [is_remove], [lamakerja]) VALUES (45, 1, CAST(N'2020-03-04' AS Date), 4, 5, 4, 50000, N'1', 49701, 0, N'bjmmc2v7Ll', 0, N'1')
INSERT [dbo].[karet_media_pembuatan] ([id], [idmedia], [tglpembuatanmedia], [idworker], [volume], [idvessel], [jumlah], [isactive], [remaining_media], [is_expired], [barcode], [is_remove], [lamakerja]) VALUES (46, 2, CAST(N'2020-03-04' AS Date), 7, 1, 3, 50000, N'1', 49975, 0, N'7usDVjGNy2', 0, N'1')
INSERT [dbo].[karet_media_pembuatan] ([id], [idmedia], [tglpembuatanmedia], [idworker], [volume], [idvessel], [jumlah], [isactive], [remaining_media], [is_expired], [barcode], [is_remove], [lamakerja]) VALUES (47, 3, CAST(N'2020-03-04' AS Date), 6, 1, 4, 50000, N'1', 50000, 0, N'trlUzmo6Ur', 0, N'1')
INSERT [dbo].[karet_media_pembuatan] ([id], [idmedia], [tglpembuatanmedia], [idworker], [volume], [idvessel], [jumlah], [isactive], [remaining_media], [is_expired], [barcode], [is_remove], [lamakerja]) VALUES (48, 4, CAST(N'2020-03-04' AS Date), 2, 1, 3, 50000, N'1', 49990, 0, N'ZUyhwgqrJx', 0, N'1')
INSERT [dbo].[karet_media_pembuatan] ([id], [idmedia], [tglpembuatanmedia], [idworker], [volume], [idvessel], [jumlah], [isactive], [remaining_media], [is_expired], [barcode], [is_remove], [lamakerja]) VALUES (49, 5, CAST(N'2020-03-04' AS Date), 3, 1, 4, 5100, N'1', 1657, 0, N'doMAMLss7i', 0, N'1')
SET IDENTITY_INSERT [dbo].[karet_media_pembuatan] OFF
SET IDENTITY_INSERT [dbo].[karet_media_pengeluaran] ON 

INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (27, 18, 2, 1, 29, 1, NULL, NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (28, 6, 2, 1, 30, 1, NULL, NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (30, 5, 2, 1, 22, 1, NULL, NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (32, 10, 2, 1, 22, 2, CAST(N'2020-01-22 00:00:00.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (33, 4, 2, 1, 22, 2, CAST(N'2020-01-22 00:00:00.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (34, 2, 2, 1, 22, 2, CAST(N'2020-01-22 00:00:00.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (35, 4, 2, 1, 23, 2, CAST(N'2020-01-22 00:00:00.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (36, 2, 2, 1, 22, 2, CAST(N'2020-01-26 00:00:00.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (37, 3, 2, 1, 23, 2, CAST(N'2020-01-26 00:00:00.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (38, 1, 2, 1, 24, 1, CAST(N'2020-01-26 00:00:00.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (39, 2, 2, 1, 22, 2, CAST(N'2020-01-26 00:00:00.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (40, 4, 2, 1, 23, 13, CAST(N'2020-01-27 00:00:00.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (41, 4, 2, 1, 23, 2, CAST(N'2020-01-27 00:00:00.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (42, 4, 2, 1, 23, 2, CAST(N'2020-01-27 00:00:00.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (43, 4, 2, 1, 23, 2, CAST(N'2020-01-27 00:00:00.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (47, 1, 4, 1, 23, 4, CAST(N'2020-02-03 00:00:00.000' AS DateTime), N'1')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (48, 1, 2, 1, 24, 13, CAST(N'2020-02-07 00:00:00.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (49, 1, 2, 1, 24, 2, CAST(N'2020-02-07 00:00:00.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (50, 8, 2, 1, 31, 1, CAST(N'2020-02-07 00:00:00.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (51, 1, 2, 1, 31, 1, CAST(N'2020-02-07 00:00:00.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (52, 3, 2, 1, 31, 2, CAST(N'2020-02-07 00:00:00.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (53, 1, 4, 1, 24, 4, CAST(N'2020-02-07 00:00:00.000' AS DateTime), N'3')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (56, 1, 5, 1, 23, 5, CAST(N'2020-02-07 00:00:00.000' AS DateTime), N'1')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (57, 1, 5, 1, 23, 5, CAST(N'2020-02-07 00:00:00.000' AS DateTime), N'1')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (59, 5, 2, 1, 33, 13, CAST(N'2020-02-13 00:00:00.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (62, 4, 2, 1, 33, 1, CAST(N'2020-02-19 12:51:02.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (63, 5, 2, 1, 31, 2, CAST(N'2020-02-19 14:01:15.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (66, 1, 3, 1, NULL, 3, CAST(N'2020-02-27 00:51:21.000' AS DateTime), N'4,2')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (80, 1, 4, 1, NULL, 4, CAST(N'2020-03-02 21:58:01.000' AS DateTime), N'3')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (81, 1, 4, 1, NULL, 4, CAST(N'2020-03-02 22:02:39.000' AS DateTime), N'4,2')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (82, 1, 5, 1, 24, 5, CAST(N'2020-03-02 22:14:35.000' AS DateTime), N'3')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (83, 1, 5, 1, NULL, 5, CAST(N'2020-03-03 16:05:31.000' AS DateTime), N'3')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (84, 20, 2, 1, 34, 1, CAST(N'2020-03-04 13:26:25.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (85, 21, 2, 1, 35, 1, CAST(N'2020-03-04 13:27:18.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (86, 22, 2, 1, 36, 1, CAST(N'2020-03-04 13:27:59.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (87, 10, 2, 1, 34, 2, CAST(N'2020-03-04 13:31:58.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (88, 2, 2, 1, 35, 2, CAST(N'2020-03-04 13:34:46.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (89, 4, 2, 1, 36, 2, CAST(N'2020-03-04 13:36:27.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (90, 90, 2, 1, 37, 1, CAST(N'2020-03-04 14:03:24.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (91, 1, 4, 1, 34, 4, CAST(N'2020-03-04 14:09:05.000' AS DateTime), N'7')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (92, 1, 4, 1, 23, 4, CAST(N'2020-03-04 14:09:36.000' AS DateTime), N'6')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (93, 1, 4, 1, 35, 4, CAST(N'2020-03-04 14:11:08.000' AS DateTime), N'8')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (94, 1, 5, 1, 34, 5, CAST(N'2020-03-04 14:14:13.000' AS DateTime), N'7')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (95, 1, 5, 1, 23, 5, CAST(N'2020-03-04 14:15:31.000' AS DateTime), N'6')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (96, 3, 2, 1, 37, 2, CAST(N'2020-03-19 15:50:33.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (97, 22, 2, 1, 38, 1, CAST(N'2020-03-19 15:54:05.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (98, 1, 4, 1, 37, 4, CAST(N'2020-03-20 08:48:05.000' AS DateTime), N'9')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (99, 1, 5, 1, 37, 5, CAST(N'2020-03-20 08:49:40.000' AS DateTime), N'9')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (100, 1, 4, 1, 37, 4, CAST(N'2020-03-20 08:52:46.000' AS DateTime), N'10')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (101, 3433, 5, 1, NULL, 5, CAST(N'2020-03-30 16:33:12.000' AS DateTime), N'7')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1101, 22, 2, 1, 39, 1, CAST(N'2020-04-02 13:27:11.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1102, 21, 2, 1, 40, 1, CAST(N'2020-04-02 13:27:55.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1103, 21, 2, 1, 41, 1, CAST(N'2020-04-02 13:28:33.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1104, 21, 2, 1, 42, 1, CAST(N'2020-04-02 13:29:07.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1105, 21, 2, 1, 43, 1, CAST(N'2020-04-02 13:29:32.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1106, 20, 2, 1, 44, 1, CAST(N'2020-04-02 13:30:11.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1107, 1, 2, 1, 41, 2, CAST(N'2020-04-02 13:32:12.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1108, 2, 2, 1, 44, 2, CAST(N'2020-04-02 13:34:13.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1109, 4, 2, 1, 42, 2, CAST(N'2020-04-02 13:50:09.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1110, 1, 4, 1, 41, 4, CAST(N'2020-04-02 13:53:14.000' AS DateTime), N'11')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1111, 1, 4, 1, 41, 4, CAST(N'2020-04-02 13:53:58.000' AS DateTime), N'12')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1112, 1, 4, 1, 44, 4, CAST(N'2020-04-02 13:55:11.000' AS DateTime), N'13')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1113, 1, 4, 1, 44, 4, CAST(N'2020-04-02 13:56:03.000' AS DateTime), N'15')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1114, 1, 4, 1, 44, 4, CAST(N'2020-04-02 13:56:30.000' AS DateTime), N'16')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1115, 1, 5, 1, 41, 5, CAST(N'2020-04-02 13:59:33.000' AS DateTime), N'11')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1116, 1, 5, 1, 41, 5, CAST(N'2020-04-02 14:00:04.000' AS DateTime), N'12')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1117, 1, 5, 1, 44, 5, CAST(N'2020-04-02 14:00:22.000' AS DateTime), N'13')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1118, 1, 5, 1, 44, 5, CAST(N'2020-04-02 14:00:55.000' AS DateTime), N'16')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1119, 1, 2, 1, 43, 2, CAST(N'2020-04-02 14:11:23.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1120, 0, 2, 1, 40, 0, CAST(N'2020-04-10 13:20:54.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1121, 4, 2, 1, 23, 1, CAST(N'2020-04-19 14:16:46.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1122, 3, 2, 1, 23, 2, CAST(N'2020-04-19 20:43:33.000' AS DateTime), NULL)
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1123, 1, 7, 1, NULL, 5, CAST(N'2020-04-19 23:39:07.000' AS DateTime), N'7')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1124, 0, 7, 1, NULL, 0, CAST(N'2020-04-19 23:58:42.000' AS DateTime), N'13')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1125, 1, 7, 1, NULL, 5, CAST(N'2020-04-19 23:58:47.000' AS DateTime), N'13')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1126, 1, 7, 1, NULL, 5, CAST(N'2020-04-20 00:00:24.000' AS DateTime), N'1')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1127, 1, 7, 1, NULL, 5, CAST(N'2020-04-20 00:04:49.000' AS DateTime), N'12')
INSERT [dbo].[karet_media_pengeluaran] ([id], [jumlah_keluar], [reju_step], [isactive], [id_treatment], [id_media], [tglkeluar], [id_embryo]) VALUES (1128, 1, 7, 1, 23, 5, CAST(N'2020-04-20 00:57:03.000' AS DateTime), N'2')
SET IDENTITY_INSERT [dbo].[karet_media_pengeluaran] OFF
SET IDENTITY_INSERT [dbo].[karet_media_transaction_log] ON 

INSERT [dbo].[karet_media_transaction_log] ([id], [idpembuatanmedia], [isactive], [no_vessel], [tglkeluar], [reju_step]) VALUES (1, 16, N'1', 9, CAST(N'2019-12-21' AS Date), 2)
INSERT [dbo].[karet_media_transaction_log] ([id], [idpembuatanmedia], [isactive], [no_vessel], [tglkeluar], [reju_step]) VALUES (2, 16, N'1', 15, CAST(N'2019-12-22' AS Date), 2)
INSERT [dbo].[karet_media_transaction_log] ([id], [idpembuatanmedia], [isactive], [no_vessel], [tglkeluar], [reju_step]) VALUES (3, 16, N'1', 6, CAST(N'2019-12-22' AS Date), 2)
INSERT [dbo].[karet_media_transaction_log] ([id], [idpembuatanmedia], [isactive], [no_vessel], [tglkeluar], [reju_step]) VALUES (4, 15, N'1', 8, CAST(N'2019-12-23' AS Date), 2)
INSERT [dbo].[karet_media_transaction_log] ([id], [idpembuatanmedia], [isactive], [no_vessel], [tglkeluar], [reju_step]) VALUES (9, 15, N'1', 12, CAST(N'2020-01-11' AS Date), 2)
INSERT [dbo].[karet_media_transaction_log] ([id], [idpembuatanmedia], [isactive], [no_vessel], [tglkeluar], [reju_step]) VALUES (10, 17, N'1', 10, CAST(N'2020-01-13' AS Date), 3)
SET IDENTITY_INSERT [dbo].[karet_media_transaction_log] OFF
SET IDENTITY_INSERT [dbo].[karet_media_type] ON 

INSERT [dbo].[karet_media_type] ([id], [nama_jenis], [keterangan], [isactive]) VALUES (1, N'Inisiasi', N'Media yang digunakan pada tahap 1 (awal)', N'1')
INSERT [dbo].[karet_media_type] ([id], [nama_jenis], [keterangan], [isactive]) VALUES (2, N'Transfer', N'Media yang digunakan untuk tahap 2 (transfer)', N'1')
INSERT [dbo].[karet_media_type] ([id], [nama_jenis], [keterangan], [isactive]) VALUES (3, N'Callus', N'', N'1')
INSERT [dbo].[karet_media_type] ([id], [nama_jenis], [keterangan], [isactive]) VALUES (4, N'Embrio', N'', N'1')
INSERT [dbo].[karet_media_type] ([id], [nama_jenis], [keterangan], [isactive]) VALUES (5, N'Germinasi', N'', N'1')
INSERT [dbo].[karet_media_type] ([id], [nama_jenis], [keterangan], [isactive]) VALUES (6, N'Shoot Multipication', N'', N'1')
INSERT [dbo].[karet_media_type] ([id], [nama_jenis], [keterangan], [isactive]) VALUES (7, N'Multiplikasi', N'', N'1')
INSERT [dbo].[karet_media_type] ([id], [nama_jenis], [keterangan], [isactive]) VALUES (8, N'Pre Aklim', N'', N'1')
INSERT [dbo].[karet_media_type] ([id], [nama_jenis], [keterangan], [isactive]) VALUES (9, N'asddfsdvdf', N'e', N'0')
INSERT [dbo].[karet_media_type] ([id], [nama_jenis], [keterangan], [isactive]) VALUES (10, N'cwcfefSDS', N'', N'0')
INSERT [dbo].[karet_media_type] ([id], [nama_jenis], [keterangan], [isactive]) VALUES (11, N'baAru neW', N'', N'1')
INSERT [dbo].[karet_media_type] ([id], [nama_jenis], [keterangan], [isactive]) VALUES (12, N'DASFddfsfsd', N'', N'0')
INSERT [dbo].[karet_media_type] ([id], [nama_jenis], [keterangan], [isactive]) VALUES (13, N'Test tipe media', N'asda asd ', N'0')
INSERT [dbo].[karet_media_type] ([id], [nama_jenis], [keterangan], [isactive]) VALUES (14, N'Test media 123', N' asd asda dsa', N'0')
SET IDENTITY_INSERT [dbo].[karet_media_type] OFF
SET IDENTITY_INSERT [dbo].[karet_motherplan] ON 

INSERT [dbo].[karet_motherplan] ([id], [idembryo], [idresource], [idtreatment], [codese], [certified], [nocertified], [initiationyear], [tree], [treepart], [harvestdate], [receptiondate], [initiationdate], [idmedium], [germinationdate], [germinationmedium], [maturation2medium], [maturation1medium], [embryomedium], [initiationmedium], [leafsample], [leafsamplelocation], [leafsamplecirad], [germinationse], [used], [isactive], [deactive]) VALUES (16, 1, NULL, 1, N'a', N'Yes', NULL, N'2017', N'2', N'1', CAST(N'2020-02-10' AS Date), CAST(N'2020-02-10' AS Date), NULL, 1, CAST(N'2020-02-10' AS Date), N'1', NULL, NULL, NULL, NULL, N'Yes', N'1', N'Yes', N'1', N'N', NULL, N'No')
INSERT [dbo].[karet_motherplan] ([id], [idembryo], [idresource], [idtreatment], [codese], [certified], [nocertified], [initiationyear], [tree], [treepart], [harvestdate], [receptiondate], [initiationdate], [idmedium], [germinationdate], [germinationmedium], [maturation2medium], [maturation1medium], [embryomedium], [initiationmedium], [leafsample], [leafsamplelocation], [leafsamplecirad], [germinationse], [used], [isactive], [deactive]) VALUES (17, 1, NULL, 1, N'a', N'Yes', NULL, N'2017', N'1', N'1', CAST(N'2020-02-10' AS Date), CAST(N'2020-02-10' AS Date), NULL, 1, CAST(N'2020-02-10' AS Date), N'1', NULL, NULL, NULL, NULL, N'Yes', N'1', N'Yes', N'1', N'N', NULL, N'No')
INSERT [dbo].[karet_motherplan] ([id], [idembryo], [idresource], [idtreatment], [codese], [certified], [nocertified], [initiationyear], [tree], [treepart], [harvestdate], [receptiondate], [initiationdate], [idmedium], [germinationdate], [germinationmedium], [maturation2medium], [maturation1medium], [embryomedium], [initiationmedium], [leafsample], [leafsamplelocation], [leafsamplecirad], [germinationse], [used], [isactive], [deactive]) VALUES (18, 1, NULL, 1, N'PB217-19-A_M_000018', N'Yes', NULL, N'2017', N'1', N'1', CAST(N'2020-02-10' AS Date), CAST(N'2020-02-10' AS Date), NULL, 1, CAST(N'2020-02-10' AS Date), N'1', NULL, NULL, NULL, NULL, N'Yes', N'1', N'Yes', N'1', N'N', NULL, N'No')
INSERT [dbo].[karet_motherplan] ([id], [idembryo], [idresource], [idtreatment], [codese], [certified], [nocertified], [initiationyear], [tree], [treepart], [harvestdate], [receptiondate], [initiationdate], [idmedium], [germinationdate], [germinationmedium], [maturation2medium], [maturation1medium], [embryomedium], [initiationmedium], [leafsample], [leafsamplelocation], [leafsamplecirad], [germinationse], [used], [isactive], [deactive]) VALUES (19, 1, NULL, 1, N'PB217-19-B_M_000019', N'Yes', NULL, N'2019', N'1', N'5', CAST(N'2020-02-10' AS Date), CAST(N'2020-02-10' AS Date), NULL, 1, CAST(N'2020-02-10' AS Date), N'1', NULL, NULL, NULL, NULL, N'Yes', N'2', N'Yes', N'1', N'N', NULL, N'No')
INSERT [dbo].[karet_motherplan] ([id], [idembryo], [idresource], [idtreatment], [codese], [certified], [nocertified], [initiationyear], [tree], [treepart], [harvestdate], [receptiondate], [initiationdate], [idmedium], [germinationdate], [germinationmedium], [maturation2medium], [maturation1medium], [embryomedium], [initiationmedium], [leafsample], [leafsamplelocation], [leafsamplecirad], [germinationse], [used], [isactive], [deactive]) VALUES (20, 1, NULL, 1, N'PB217-19-C_M_000020', N'Yes', NULL, N'2017', N'1', N'5', CAST(N'2020-02-10' AS Date), CAST(N'2020-02-10' AS Date), NULL, 1, CAST(N'2020-02-10' AS Date), N'1', NULL, NULL, NULL, NULL, N'Yes', N'1', N'Yes', N'1', N'N', NULL, N'No')
INSERT [dbo].[karet_motherplan] ([id], [idembryo], [idresource], [idtreatment], [codese], [certified], [nocertified], [initiationyear], [tree], [treepart], [harvestdate], [receptiondate], [initiationdate], [idmedium], [germinationdate], [germinationmedium], [maturation2medium], [maturation1medium], [embryomedium], [initiationmedium], [leafsample], [leafsamplelocation], [leafsamplecirad], [germinationse], [used], [isactive], [deactive]) VALUES (21, 1, NULL, 1, N'a', N'Yes', NULL, N'2017', N'4', N'2', CAST(N'2020-02-27' AS Date), CAST(N'2020-02-12' AS Date), NULL, 1, CAST(N'2020-02-11' AS Date), N'4', NULL, NULL, NULL, NULL, N'Yes', N'1', N'Yes', N'C', N'N', NULL, N'No')
INSERT [dbo].[karet_motherplan] ([id], [idembryo], [idresource], [idtreatment], [codese], [certified], [nocertified], [initiationyear], [tree], [treepart], [harvestdate], [receptiondate], [initiationdate], [idmedium], [germinationdate], [germinationmedium], [maturation2medium], [maturation1medium], [embryomedium], [initiationmedium], [leafsample], [leafsamplelocation], [leafsamplecirad], [germinationse], [used], [isactive], [deactive]) VALUES (22, 1, NULL, 1, N'a', N'Yes', NULL, N'2017', N'4', N'2', CAST(N'2020-02-27' AS Date), CAST(N'2020-02-12' AS Date), NULL, 1, CAST(N'2020-02-11' AS Date), N'4', NULL, NULL, NULL, NULL, N'Yes', N'1', N'Yes', N'C', N'N', NULL, N'No')
INSERT [dbo].[karet_motherplan] ([id], [idembryo], [idresource], [idtreatment], [codese], [certified], [nocertified], [initiationyear], [tree], [treepart], [harvestdate], [receptiondate], [initiationdate], [idmedium], [germinationdate], [germinationmedium], [maturation2medium], [maturation1medium], [embryomedium], [initiationmedium], [leafsample], [leafsamplelocation], [leafsamplecirad], [germinationse], [used], [isactive], [deactive]) VALUES (23, 1, NULL, 1, N'PB330-25-A_M_000023', N'Yes', NULL, N'2019', N'10', N'2', CAST(N'2020-02-19' AS Date), CAST(N'2020-02-19' AS Date), NULL, 1, CAST(N'2020-02-25' AS Date), N'1', NULL, NULL, NULL, NULL, N'Yes', N'1', N'Yes', N'A', N'N', NULL, N'No')
INSERT [dbo].[karet_motherplan] ([id], [idembryo], [idresource], [idtreatment], [codese], [certified], [nocertified], [initiationyear], [tree], [treepart], [harvestdate], [receptiondate], [initiationdate], [idmedium], [germinationdate], [germinationmedium], [maturation2medium], [maturation1medium], [embryomedium], [initiationmedium], [leafsample], [leafsamplelocation], [leafsamplecirad], [germinationse], [used], [isactive], [deactive]) VALUES (24, 1, NULL, 1, N'PB217-19-22_M_000024', N'Yes', NULL, N'2020', N'1', N'2', CAST(N'2020-02-16' AS Date), CAST(N'2020-02-17' AS Date), NULL, NULL, CAST(N'2020-02-17' AS Date), N'4', NULL, NULL, NULL, NULL, N'Yes', N'qw', N'Yes', N'23', N'N', NULL, N'No')
INSERT [dbo].[karet_motherplan] ([id], [idembryo], [idresource], [idtreatment], [codese], [certified], [nocertified], [initiationyear], [tree], [treepart], [harvestdate], [receptiondate], [initiationdate], [idmedium], [germinationdate], [germinationmedium], [maturation2medium], [maturation1medium], [embryomedium], [initiationmedium], [leafsample], [leafsamplelocation], [leafsamplecirad], [germinationse], [used], [isactive], [deactive]) VALUES (25, 1, NULL, 1, N'PB217-19-22_M_000025', N'Yes', NULL, N'2020', N'1', N'2', CAST(N'2020-02-17' AS Date), CAST(N'2020-02-17' AS Date), CAST(N'2020-02-18' AS Date), NULL, CAST(N'2020-02-17' AS Date), N'3', NULL, NULL, NULL, NULL, N'Yes', N'3', N'Yes', N'2', N'N', NULL, N'No')
SET IDENTITY_INSERT [dbo].[karet_motherplan] OFF
SET IDENTITY_INSERT [dbo].[karet_motherplan_comment] ON 

INSERT [dbo].[karet_motherplan_comment] ([comment_id], [comment_motherplan], [comment_content], [comment_date]) VALUES (1, 19, N'Test Comment', CAST(N'2020-02-17' AS Date))
INSERT [dbo].[karet_motherplan_comment] ([comment_id], [comment_motherplan], [comment_content], [comment_date]) VALUES (2, 19, N'Test Commentzzzzz', CAST(N'2020-02-17' AS Date))
INSERT [dbo].[karet_motherplan_comment] ([comment_id], [comment_motherplan], [comment_content], [comment_date]) VALUES (3, 23, N'Test edit komentar', CAST(N'2020-02-17' AS Date))
INSERT [dbo].[karet_motherplan_comment] ([comment_id], [comment_motherplan], [comment_content], [comment_date]) VALUES (4, 23, N'Test 2', CAST(N'2020-02-22' AS Date))
SET IDENTITY_INSERT [dbo].[karet_motherplan_comment] OFF
SET IDENTITY_INSERT [dbo].[karet_motherplan_file] ON 

INSERT [dbo].[karet_motherplan_file] ([file_id], [file_name], [file_location], [file_comment], [file_date], [file_motherplan]) VALUES (1002, N'Screenshot (1).png', N'uploads/Screenshot (1).png', N'Gambar 1', CAST(N'2020-02-04' AS Date), 23)
INSERT [dbo].[karet_motherplan_file] ([file_id], [file_name], [file_location], [file_comment], [file_date], [file_motherplan]) VALUES (11, N'note.txt', N'uploads/note16-02-2020_16_50_26.txt', N'Test 4', CAST(N'2020-02-17' AS Date), 23)
SET IDENTITY_INSERT [dbo].[karet_motherplan_file] OFF
SET IDENTITY_INSERT [dbo].[karet_motherplant_in] ON 

INSERT [dbo].[karet_motherplant_in] ([id], [id_embryo], [codese], [isactive], [is_available], [transferdate], [worker], [leafsample], [resultofident]) VALUES (2, 1, N'PB217-Z8-1_M_000002', 1, 1, CAST(N'2020-02-08' AS Date), NULL, N'OK', N'PB217-Zygotic')
SET IDENTITY_INSERT [dbo].[karet_motherplant_in] OFF
SET IDENTITY_INSERT [dbo].[karet_plantation] ON 

INSERT [dbo].[karet_plantation] ([id], [name], [isactive], [description]) VALUES (1, N'HALIMBE', N'1', NULL)
INSERT [dbo].[karet_plantation] ([id], [name], [isactive], [description]) VALUES (2, N'TANAH BESIH', N'1', N'')
INSERT [dbo].[karet_plantation] ([id], [name], [isactive], [description]) VALUES (3, N'BANGUN BANDAR', N'0', N'<p>BB</p>')
INSERT [dbo].[karet_plantation] ([id], [name], [isactive], [description]) VALUES (4, N'TANJUNG MARIA', N'0', NULL)
INSERT [dbo].[karet_plantation] ([id], [name], [isactive], [description]) VALUES (5, N'ACEH', N'0', NULL)
INSERT [dbo].[karet_plantation] ([id], [name], [isactive], [description]) VALUES (6, N'AEKLOBA', N'0', NULL)
INSERT [dbo].[karet_plantation] ([id], [name], [isactive], [description]) VALUES (7, N'BERINGIN', N'0', N'')
INSERT [dbo].[karet_plantation] ([id], [name], [isactive], [description]) VALUES (8, N'TEST 2', N'1', N'')
INSERT [dbo].[karet_plantation] ([id], [name], [isactive], [description]) VALUES (9, N'BANGUN BANDAR', N'1', N'')
SET IDENTITY_INSERT [dbo].[karet_plantation] OFF
SET IDENTITY_INSERT [dbo].[karet_plantation_block] ON 

INSERT [dbo].[karet_plantation_block] ([id], [idplantation], [description], [isactive], [blocknumber]) VALUES (1, 1, N'ASD', 1, N'5')
INSERT [dbo].[karet_plantation_block] ([id], [idplantation], [description], [isactive], [blocknumber]) VALUES (2, 1, N'Lorem ipsum set dolor amet', 1, N'2')
INSERT [dbo].[karet_plantation_block] ([id], [idplantation], [description], [isactive], [blocknumber]) VALUES (3, 1, N'Blablablabla', 1, N'3')
INSERT [dbo].[karet_plantation_block] ([id], [idplantation], [description], [isactive], [blocknumber]) VALUES (4, 1, N'Loremansduasdb', 1, N'10')
INSERT [dbo].[karet_plantation_block] ([id], [idplantation], [description], [isactive], [blocknumber]) VALUES (5, 1, N'ADaiwdhiahwihdiashida', 1, N'8')
INSERT [dbo].[karet_plantation_block] ([id], [idplantation], [description], [isactive], [blocknumber]) VALUES (6, 2, N'Blablabla', 1, N'12')
INSERT [dbo].[karet_plantation_block] ([id], [idplantation], [description], [isactive], [blocknumber]) VALUES (7, 2, N'Description', 1, N'19')
INSERT [dbo].[karet_plantation_block] ([id], [idplantation], [description], [isactive], [blocknumber]) VALUES (8, 2, N'', 1, N'38')
INSERT [dbo].[karet_plantation_block] ([id], [idplantation], [description], [isactive], [blocknumber]) VALUES (9, 2, N'', 1, N'25')
INSERT [dbo].[karet_plantation_block] ([id], [idplantation], [description], [isactive], [blocknumber]) VALUES (10, 8, N'ASDAS', 1, N'21')
SET IDENTITY_INSERT [dbo].[karet_plantation_block] OFF
SET IDENTITY_INSERT [dbo].[karet_plantation_panel] ON 

INSERT [dbo].[karet_plantation_panel] ([id], [idblock], [panelname], [description], [isactive]) VALUES (1, 1, N'Javelin ', N'BlaBla', N'1')
INSERT [dbo].[karet_plantation_panel] ([id], [idblock], [panelname], [description], [isactive]) VALUES (2, 2, N'Flowerisitata', N'Adsad Adnasbd Aasda ', N'1')
INSERT [dbo].[karet_plantation_panel] ([id], [idblock], [panelname], [description], [isactive]) VALUES (3, 3, N'Bravista', N'BlaBla', N'1')
INSERT [dbo].[karet_plantation_panel] ([id], [idblock], [panelname], [description], [isactive]) VALUES (4, 5, N'Prinsopasala', N'Aasdasdasd', N'1')
INSERT [dbo].[karet_plantation_panel] ([id], [idblock], [panelname], [description], [isactive]) VALUES (5, 3, N'Simpifany', N'Adasfasf', N'1')
INSERT [dbo].[karet_plantation_panel] ([id], [idblock], [panelname], [description], [isactive]) VALUES (6, 5, N'Sasbristila', N'Adaasdas', N'1')
INSERT [dbo].[karet_plantation_panel] ([id], [idblock], [panelname], [description], [isactive]) VALUES (7, 6, N'Bristania Clear', N'ASD', N'1')
INSERT [dbo].[karet_plantation_panel] ([id], [idblock], [panelname], [description], [isactive]) VALUES (8, 10, N'Jxsada', N'', N'1')
SET IDENTITY_INSERT [dbo].[karet_plantation_panel] OFF
SET IDENTITY_INSERT [dbo].[karet_reception] ON 

INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (1, 5, CAST(N'2017-01-11' AS Date), CAST(N'2017-01-11' AS Date), CAST(N'2017-01-11' AS Date), 2, 6, NULL, N'1', 2, 11, 2, N'19', NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (2, 6, CAST(N'2017-01-11' AS Date), CAST(N'2017-01-11' AS Date), CAST(N'2017-01-11' AS Date), 0, 3, N'MERAH', N'1', 2, 11, 2, N'19', NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (3, 7, CAST(N'2017-01-11' AS Date), CAST(N'2017-01-11' AS Date), CAST(N'2017-01-11' AS Date), 0, 2, N'BERAIR', N'1', 2, 5, 2, N'38', NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (4, 8, CAST(N'2017-01-11' AS Date), CAST(N'2017-01-11' AS Date), CAST(N'2017-01-11' AS Date), 0, 1, N'MERAH', N'1', 2, 2, 2, N'25', NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (5, 9, CAST(N'2017-01-11' AS Date), CAST(N'2017-01-11' AS Date), CAST(N'2017-01-11' AS Date), 1, 0, NULL, N'1', 2, 5, 2, N'38', NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (6, 10, CAST(N'2017-01-11' AS Date), CAST(N'2017-01-11' AS Date), CAST(N'2017-01-11' AS Date), 1, 0, NULL, N'1', 7, 2, 2, N'25', NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (7, 11, CAST(N'2017-01-11' AS Date), CAST(N'2017-01-11' AS Date), CAST(N'2017-01-11' AS Date), 2, 0, NULL, N'1', 2, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (8, 12, CAST(N'2017-01-11' AS Date), CAST(N'2017-01-11' AS Date), CAST(N'2017-01-11' AS Date), 1, 0, NULL, N'1', 7, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (9, 13, CAST(N'2017-01-19' AS Date), CAST(N'2017-01-19' AS Date), CAST(N'2017-01-19' AS Date), 0, 1, NULL, N'1', 2, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (10, 14, CAST(N'2017-01-19' AS Date), CAST(N'2017-01-19' AS Date), CAST(N'2017-01-19' AS Date), 0, 2, NULL, N'1', 2, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (11, 15, CAST(N'2017-01-19' AS Date), CAST(N'2017-01-19' AS Date), CAST(N'2017-01-19' AS Date), 0, 1, N'KERAS', N'1', 2, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (12, 16, CAST(N'2017-01-19' AS Date), CAST(N'2017-01-19' AS Date), CAST(N'2017-01-19' AS Date), 0, 3, N'KERAS', N'1', 2, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (13, 17, CAST(N'2017-01-19' AS Date), CAST(N'2017-01-19' AS Date), CAST(N'2017-01-19' AS Date), 0, 9, NULL, N'1', 2, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (14, 18, CAST(N'2017-01-19' AS Date), CAST(N'2017-01-19' AS Date), CAST(N'2017-01-19' AS Date), 0, 8, NULL, N'1', 2, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (16, 19, CAST(N'2017-03-10' AS Date), CAST(N'2017-03-10' AS Date), CAST(N'2017-03-10' AS Date), 0, 8, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (17, 20, CAST(N'2017-03-10' AS Date), CAST(N'2017-03-10' AS Date), CAST(N'2017-03-10' AS Date), 0, 5, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (18, 21, CAST(N'2017-03-10' AS Date), CAST(N'2017-03-10' AS Date), CAST(N'2017-03-10' AS Date), 0, 11, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (19, 22, CAST(N'2017-03-10' AS Date), CAST(N'2017-03-10' AS Date), CAST(N'2017-03-10' AS Date), 0, 9, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (20, 23, CAST(N'2017-12-05' AS Date), CAST(N'2017-12-05' AS Date), CAST(N'2017-12-05' AS Date), 0, 1, NULL, N'1', 2, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (21, 24, CAST(N'2017-12-05' AS Date), CAST(N'2017-12-05' AS Date), CAST(N'2017-12-05' AS Date), 0, 2, NULL, N'1', 2, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (22, 25, CAST(N'2017-12-05' AS Date), CAST(N'2017-12-05' AS Date), CAST(N'2017-12-05' AS Date), 0, 1, NULL, N'1', 2, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (23, 26, CAST(N'2017-12-06' AS Date), CAST(N'2017-12-06' AS Date), CAST(N'2017-12-06' AS Date), 0, 1, NULL, N'1', 2, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (24, 27, CAST(N'2017-12-06' AS Date), CAST(N'2017-12-06' AS Date), CAST(N'2017-12-06' AS Date), 0, 2, N'KERAS', N'1', 2, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (25, 28, CAST(N'2017-12-06' AS Date), CAST(N'2017-12-06' AS Date), CAST(N'2017-12-06' AS Date), 0, 3, NULL, N'1', 2, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (26, 32, CAST(N'2017-12-06' AS Date), CAST(N'2017-12-06' AS Date), CAST(N'2017-12-06' AS Date), 0, 1, NULL, N'1', 2, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (27, 30, CAST(N'2017-12-06' AS Date), CAST(N'2017-12-06' AS Date), CAST(N'2017-12-06' AS Date), 0, 4, NULL, N'1', 2, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (28, 31, CAST(N'2018-01-16' AS Date), CAST(N'2018-01-16' AS Date), CAST(N'2018-01-16' AS Date), 0, 2, NULL, N'1', 2, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (29, 32, CAST(N'2018-01-16' AS Date), CAST(N'2018-01-16' AS Date), CAST(N'2018-01-16' AS Date), 0, 3, NULL, N'1', 2, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (30, 33, CAST(N'2018-09-13' AS Date), CAST(N'2018-09-13' AS Date), CAST(N'2018-09-13' AS Date), 0, 2, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (31, 34, CAST(N'2018-09-13' AS Date), CAST(N'2018-09-13' AS Date), CAST(N'2018-09-13' AS Date), 0, 2, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (32, 40, CAST(N'2018-09-13' AS Date), CAST(N'2018-09-13' AS Date), CAST(N'2018-09-13' AS Date), 0, 10, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (33, 41, CAST(N'2018-09-13' AS Date), CAST(N'2018-09-13' AS Date), CAST(N'2018-09-13' AS Date), 0, 19, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (34, 37, CAST(N'2018-09-13' AS Date), CAST(N'2018-09-13' AS Date), CAST(N'2018-09-13' AS Date), 0, 1, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (35, 38, CAST(N'2018-09-13' AS Date), CAST(N'2018-09-13' AS Date), CAST(N'2018-09-13' AS Date), 0, 17, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (36, 39, CAST(N'2018-11-30' AS Date), CAST(N'2018-11-30' AS Date), CAST(N'2018-11-30' AS Date), 0, 20, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (37, 40, CAST(N'2018-11-30' AS Date), CAST(N'2018-11-30' AS Date), CAST(N'2018-11-30' AS Date), 0, 8, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (38, 41, CAST(N'2018-11-30' AS Date), CAST(N'2018-11-30' AS Date), CAST(N'2017-11-30' AS Date), 0, 12, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (39, 51, CAST(N'2018-11-30' AS Date), CAST(N'2018-11-30' AS Date), CAST(N'2018-11-30' AS Date), 0, 6, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (40, 43, CAST(N'2018-12-10' AS Date), CAST(N'2018-12-10' AS Date), CAST(N'2018-12-10' AS Date), 0, 5, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (41, 44, CAST(N'2018-12-10' AS Date), CAST(N'2018-12-10' AS Date), CAST(N'2018-12-10' AS Date), 0, 9, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (42, 45, CAST(N'2018-12-10' AS Date), CAST(N'2018-12-10' AS Date), CAST(N'2018-12-10' AS Date), 0, 1, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (43, 46, CAST(N'2018-12-10' AS Date), CAST(N'2018-12-10' AS Date), CAST(N'2018-12-10' AS Date), 0, 2, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (44, 47, CAST(N'2018-12-10' AS Date), CAST(N'2018-12-10' AS Date), CAST(N'2018-12-10' AS Date), 0, 3, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (45, 48, CAST(N'2018-12-10' AS Date), CAST(N'2018-12-10' AS Date), CAST(N'2018-12-10' AS Date), 0, 2, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (46, 49, CAST(N'2018-12-21' AS Date), CAST(N'2018-12-21' AS Date), CAST(N'2018-12-21' AS Date), 0, 5, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (47, 50, CAST(N'2018-12-21' AS Date), CAST(N'2018-12-21' AS Date), CAST(N'2018-12-21' AS Date), 0, 11, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (48, 51, CAST(N'2018-12-21' AS Date), CAST(N'2018-12-21' AS Date), CAST(N'2018-12-21' AS Date), 0, 2, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (49, 52, CAST(N'2018-12-21' AS Date), CAST(N'2018-12-21' AS Date), CAST(N'2018-12-21' AS Date), 0, 3, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (50, 54, CAST(N'2018-12-21' AS Date), CAST(N'2018-12-21' AS Date), CAST(N'2018-12-21' AS Date), 0, 2, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (51, 53, CAST(N'2018-12-21' AS Date), CAST(N'2018-12-21' AS Date), CAST(N'2018-12-21' AS Date), 0, 37, NULL, N'1', NULL, NULL, NULL, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (52, 6, CAST(N'2019-11-27' AS Date), NULL, CAST(N'2019-11-27' AS Date), 4, 6, N'Test add', N'1', 2, 11, 2, N'39', N'', NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (53, 7, CAST(N'2020-01-01' AS Date), NULL, CAST(N'2020-01-01' AS Date), 0, 3, N'', N'1', 7, 5, 2, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (54, 8, CAST(N'2020-01-15' AS Date), NULL, CAST(N'2020-01-15' AS Date), 10, 20, N'', N'1', 7, 3, 2, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (55, 6, CAST(N'2020-01-28' AS Date), NULL, CAST(N'2020-01-01' AS Date), 0, 5, N'', N'1', 1, 3, 2, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (56, 7, CAST(N'2020-01-01' AS Date), NULL, CAST(N'2020-01-26' AS Date), 0, 5, N'', N'1', 5, 2, 1, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (57, 7, CAST(N'2020-02-02' AS Date), NULL, CAST(N'2020-03-04' AS Date), 0, 0, N'', N'1', 7, 4, 8, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (58, 6, CAST(N'2022-03-03' AS Date), NULL, CAST(N'2020-03-05' AS Date), 0, 0, N'', N'1', 5, 5, 2, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (59, 8, CAST(N'2021-02-01' AS Date), NULL, CAST(N'2020-03-01' AS Date), 0, 0, N'', N'0', 7, 5, 8, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (60, 7, CAST(N'2020-02-01' AS Date), NULL, CAST(N'2020-03-04' AS Date), 0, 0, N'', N'1', 11, 3, 2, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (61, 6, CAST(N'2020-01-01' AS Date), NULL, CAST(N'2020-03-04' AS Date), 0, 0, N'', N'1', 0, 4, 2, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (62, 7, CAST(N'2021-02-01' AS Date), NULL, CAST(N'2020-03-04' AS Date), 0, 0, N'', N'1', 5, 11, 8, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (63, 7, CAST(N'2020-03-22' AS Date), NULL, CAST(N'2020-03-22' AS Date), 0, 100, N'', N'1', 7, 3, 9, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (64, 7, CAST(N'2020-03-23' AS Date), NULL, CAST(N'2020-03-23' AS Date), 0, 200, N'', N'1', 5, 5, 2, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (65, 8, CAST(N'2020-04-02' AS Date), NULL, CAST(N'2020-04-02' AS Date), 0, 0, N'', N'1', 7, 4, 8, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (66, 0, CAST(N'2020-04-03' AS Date), NULL, CAST(N'2020-04-03' AS Date), 0, 0, N'', N'1', 11, 11, 9, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (67, 9, CAST(N'2020-04-04' AS Date), NULL, CAST(N'2020-04-04' AS Date), 0, 0, N'', N'1', 7, 5, 8, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (68, 7, CAST(N'2020-04-05' AS Date), NULL, CAST(N'2020-04-02' AS Date), 0, 0, N'', N'1', 11, 5, 8, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (69, 8, CAST(N'2020-04-02' AS Date), NULL, CAST(N'2020-04-02' AS Date), 0, 0, N'', N'1', 7, 5, 8, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (70, 8, CAST(N'2020-05-01' AS Date), NULL, CAST(N'2020-04-02' AS Date), 0, 0, N'', N'1', 7, 4, 8, NULL, NULL, NULL)
INSERT [dbo].[karet_reception] ([id], [idtree], [harvestdate], [senddate], [receiptdate], [flowersharvested], [fruitsharvested], [comment], [isactive], [treepart], [clone], [plantation], [block], [line], [is_available]) VALUES (71, 7, CAST(N'2020-04-03' AS Date), NULL, CAST(N'2020-04-02' AS Date), 0, 0, N'', N'1', 11, 5, 8, NULL, NULL, NULL)
SET IDENTITY_INSERT [dbo].[karet_reception] OFF
SET IDENTITY_INSERT [dbo].[karet_reception_flowers] ON 

INSERT [dbo].[karet_reception_flowers] ([id], [idreception], [flowersused], [rottenflowers], [totalflowersused], [isactive]) VALUES (1, 52, 4, 1, 9, N'1')
INSERT [dbo].[karet_reception_flowers] ([id], [idreception], [flowersused], [rottenflowers], [totalflowersused], [isactive]) VALUES (2, 52, 4, 1, 8, N'1')
INSERT [dbo].[karet_reception_flowers] ([id], [idreception], [flowersused], [rottenflowers], [totalflowersused], [isactive]) VALUES (3, 6, 1, 0, 3, N'1')
SET IDENTITY_INSERT [dbo].[karet_reception_flowers] OFF
SET IDENTITY_INSERT [dbo].[karet_reception_fruits] ON 

INSERT [dbo].[karet_reception_fruits] ([id], [idreception], [fruitsused], [woodyfruits], [toosmallfruits], [looseseeds], [rottenfruits], [totalseeds], [isactive]) VALUES (4, 1, 6, 0, 0, 1, 0, 18, N'1')
INSERT [dbo].[karet_reception_fruits] ([id], [idreception], [fruitsused], [woodyfruits], [toosmallfruits], [looseseeds], [rottenfruits], [totalseeds], [isactive]) VALUES (5, 2, 3, 0, 0, 3, 1, 8, N'1')
INSERT [dbo].[karet_reception_fruits] ([id], [idreception], [fruitsused], [woodyfruits], [toosmallfruits], [looseseeds], [rottenfruits], [totalseeds], [isactive]) VALUES (6, 52, 6, NULL, 0, 0, 0, 18, N'1')
INSERT [dbo].[karet_reception_fruits] ([id], [idreception], [fruitsused], [woodyfruits], [toosmallfruits], [looseseeds], [rottenfruits], [totalseeds], [isactive]) VALUES (7, 52, 5, 0, 0, 0, 0, 16, N'1')
INSERT [dbo].[karet_reception_fruits] ([id], [idreception], [fruitsused], [woodyfruits], [toosmallfruits], [looseseeds], [rottenfruits], [totalseeds], [isactive]) VALUES (8, 4, 1, 0, 0, 0, 0, 3, N'1')
INSERT [dbo].[karet_reception_fruits] ([id], [idreception], [fruitsused], [woodyfruits], [toosmallfruits], [looseseeds], [rottenfruits], [totalseeds], [isactive]) VALUES (9, 3, 2, 1, 0, 0, 0, 6, N'1')
INSERT [dbo].[karet_reception_fruits] ([id], [idreception], [fruitsused], [woodyfruits], [toosmallfruits], [looseseeds], [rottenfruits], [totalseeds], [isactive]) VALUES (10, 53, 2, 1, 0, 0, 0, 6, N'1')
INSERT [dbo].[karet_reception_fruits] ([id], [idreception], [fruitsused], [woodyfruits], [toosmallfruits], [looseseeds], [rottenfruits], [totalseeds], [isactive]) VALUES (11, 55, 4, 1, 0, 0, 0, 5, N'1')
INSERT [dbo].[karet_reception_fruits] ([id], [idreception], [fruitsused], [woodyfruits], [toosmallfruits], [looseseeds], [rottenfruits], [totalseeds], [isactive]) VALUES (12, 56, 4, 1, 0, 0, 0, 5, N'1')
INSERT [dbo].[karet_reception_fruits] ([id], [idreception], [fruitsused], [woodyfruits], [toosmallfruits], [looseseeds], [rottenfruits], [totalseeds], [isactive]) VALUES (13, 64, 0, 0, 0, 0, 0, 15, N'1')
SET IDENTITY_INSERT [dbo].[karet_reception_fruits] OFF
SET IDENTITY_INSERT [dbo].[karet_reju_step] ON 

INSERT [dbo].[karet_reju_step] ([id], [nama], [isactive]) VALUES (1, N'Reception', 1)
INSERT [dbo].[karet_reju_step] ([id], [nama], [isactive]) VALUES (2, N'Initiation', 1)
INSERT [dbo].[karet_reju_step] ([id], [nama], [isactive]) VALUES (3, N'Observation', 1)
INSERT [dbo].[karet_reju_step] ([id], [nama], [isactive]) VALUES (4, N'Embryo Screening', 1)
INSERT [dbo].[karet_reju_step] ([id], [nama], [isactive]) VALUES (5, N'Maturation I', 1)
INSERT [dbo].[karet_reju_step] ([id], [nama], [isactive]) VALUES (6, N'Maturation II', 1)
INSERT [dbo].[karet_reju_step] ([id], [nama], [isactive]) VALUES (7, N'Germination', 1)
INSERT [dbo].[karet_reju_step] ([id], [nama], [isactive]) VALUES (8, N'Germination Prepare', 1)
SET IDENTITY_INSERT [dbo].[karet_reju_step] OFF
SET IDENTITY_INSERT [dbo].[karet_tree] ON 

INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (1, 2, N'7', N'A1', N'2006', 5, N'160', N'', N'Yes', N'AB', N'0', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (2, 1, N'21', N'B1', N'2007', 3, N'21', N'FLOWER', N'Yes', N'BC', N'0', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (3, 1, N'6', N'B3', N'2004', 2, N'0', NULL, N'No', N'0', N'0', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (4, 2, N'10', N'C1', N'2006', 3, N'100', NULL, N'Yes', N'1', N'0', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (5, 2, N'19', N'A1', N'2006', 11, NULL, NULL, N'Yes', NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (6, 2, N'19', N'A6', N'2006', 11, NULL, NULL, N'Yes', NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (7, 2, N'38', N'Z8', N'2013', 5, NULL, NULL, N'No', NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (8, 2, N'25', N'B18', N'1999', 2, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (9, 2, N'38', N'Z2', N'2013', 5, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (10, 2, N'25', N'B15', N'1999', 2, NULL, NULL, N'Yes', NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (11, 2, N'38', N'Z4', N'2013', 5, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (12, 2, N'25', N'B19', N'1999', 2, NULL, NULL, N'Yes', NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (13, 2, N'17', N'C2', N'2013', 11, N'160', NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (14, 2, N'17', N'C3', N'2013', 11, N'160', NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (15, 2, N'17', N'C5', N'2013', 11, N'165', NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (16, 2, N'17', N'C6', N'2013', 11, N'165', NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (17, 2, N'17', N'C7', N'2013', 11, N'158', NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (18, 2, N'17', N'C8', N'2013', 11, N'145', NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (19, 1, N'10', N'HL1', N'2010', 2, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (20, 1, N'10', N'HL2', N'2010', 2, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (21, 1, N'10', N'HL3', N'2010', 2, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (22, 1, N'10', N'HL4', N'2010', 2, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (23, 2, N'38', N'C4', N'2013', 5, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (24, 2, N'38', N'C5', N'2013', 5, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (25, 2, N'38', N'C6', N'2013', 5, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (26, 2, N'38', N'C7', N'2013', 5, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (27, 2, N'38', N'C8', N'2013', 5, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (28, 2, N'19', N'A3', N'2006', 11, NULL, NULL, N'Yes', NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (29, 2, N'19', N'A4', N'2006', 11, NULL, NULL, N'Yes', NULL, N'0', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (30, 2, N'19', N'A5', N'2006', 11, NULL, NULL, N'Yes', NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (31, 2, N'19', N'A7', N'2006', 11, NULL, NULL, N'Yes', NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (32, 2, N'19', N'A4', N'2006', 11, NULL, NULL, N'Yes', NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (33, 1, N'129', N'A1,A2', N'2012', 4, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (34, 1, N'134', N'A3,A4', N'2012', 4, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (35, 1, N'134', N'A5', N'2012', 4, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (36, 1, N'128', N'B1', N'2011', 2, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (37, 1, N'112', N'C1', N'2000', 3, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (38, 1, N'112', N'C2', N'2000', 3, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (39, 1, N'134', N'A3', N'2012', 4, NULL, NULL, N'Yes', NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (40, 1, N'134', N'A5', N'2012', 4, NULL, NULL, N'Yes', NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (41, 1, N'128', N'B1', N'2011', 2, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (42, 1, N'128', N'B2', N'2011', 2, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (43, 1, N'6', N'B3', N'2004', 2, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (44, 1, N'1', N'D1', N'2011', 15, N'', N'', N'', N'', N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (45, 1, N'1', N'A6', N'2011', 4, N'', N'', N'NULL', N'', N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (46, 1, N'5', N'A7', N'2011', 4, N'', N'', N'', N'', N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (47, 1, N'2', N'A8', N'2011', 4, N'', N'', N'', N'', N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (48, 1, N'2', N'A9', N'2011', 4, N'', N'', N'', N'', N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (49, 1, N'134', N'A10', N'2012', 4, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (50, 1, N'134', N'A11', N'2012', 4, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (51, 1, N'128', N'B2', N'2011', 2, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (52, 1, N'128', N'B4', N'2011', 2, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (53, 1, N'127', N'C3', N'2011', 3, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (54, 1, N'128', N'B5', N'2011', 2, NULL, NULL, NULL, NULL, N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (55, 1, N'2', N'AA1', N'2009', 2, N'', N'', N'No', N'', N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (56, 1, N'1', N'BB1', N'2015', 3, N'', N'', N'Yes', N'1023-1233', N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (57, 1, N'4', N'EE1', N'2014', 5, N'', N'', N'', N'', N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (58, 1, N'3', N'DD1', N'2014', 5, N'', N'', N'Yes', N'3123-3123', N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (59, 1, N'2', N'ASD3', N'2012', 4, N'', N'', N'No', N'', N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (60, 1, N'2', N'AA22', N'2006', 3, N'', N'', N'Yes', N'2132-234', N'0', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (61, 1, N'3', N'AA3', N'2007', 5, N'12', N'2', N'', N'', N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (62, 2, N'7', N'AA4', N'2005', 12, N'21', N'6', N'Yes', N'1231-1234', N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (63, 1, N'3', N'AAA6', N'2005', 3, N'1', N'1', N'', N'', N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (64, 1, N'1', N'BBB5', N'2005', 3, N'1', N'', N'No', N'', N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (65, 2, N'8', N'TEST123TREE', N'2006', 20, N'', N'', N'Yes', N'123-123-12312', N'1', NULL, NULL)
INSERT [dbo].[karet_tree] ([id], [idplantation], [block], [treecode], [yearofplanting], [clonename], [line], [gps], [certified], [certificatenumber], [isactive], [year], [season]) VALUES (66, 2, N'6', N'XYZ123', N'2007', 11, N'1', N'0', N'Yes', N'123', N'1', NULL, NULL)
SET IDENTITY_INSERT [dbo].[karet_tree] OFF
SET IDENTITY_INSERT [dbo].[karet_treepart] ON 

INSERT [dbo].[karet_treepart] ([id], [partname], [description], [isactive]) VALUES (1, N'STAGE A', N'<p>Daun</p>', N'1')
INSERT [dbo].[karet_treepart] ([id], [partname], [description], [isactive]) VALUES (2, N'STAGE D', N'<p>Daun</p>', N'0')
INSERT [dbo].[karet_treepart] ([id], [partname], [description], [isactive]) VALUES (5, N'STAGE B', N'<p>Daun</p>', N'1')
INSERT [dbo].[karet_treepart] ([id], [partname], [description], [isactive]) VALUES (6, N'STAGE E', N'<p>Daun</p>', N'0')
INSERT [dbo].[karet_treepart] ([id], [partname], [description], [isactive]) VALUES (7, N'STAGE C', N'<p>Daun</p>', N'1')
INSERT [dbo].[karet_treepart] ([id], [partname], [description], [isactive]) VALUES (8, N'STAGE E', NULL, N'0')
INSERT [dbo].[karet_treepart] ([id], [partname], [description], [isactive]) VALUES (9, N'STAGE F', NULL, N'0')
INSERT [dbo].[karet_treepart] ([id], [partname], [description], [isactive]) VALUES (10, N'STAGE G', N'Daun', N'0')
INSERT [dbo].[karet_treepart] ([id], [partname], [description], [isactive]) VALUES (11, N'STAGE D', N'adasdasd asd', N'1')
INSERT [dbo].[karet_treepart] ([id], [partname], [description], [isactive]) VALUES (12, N'E', N'asdasd sad', N'0')
SET IDENTITY_INSERT [dbo].[karet_treepart] OFF
SET IDENTITY_INSERT [dbo].[karet_users] ON 

INSERT [dbo].[karet_users] ([id], [username], [password], [isactive]) VALUES (1, N'admintckaret', N'21232f297a57a5a743894a0e4a801fc3', 1)
SET IDENTITY_INSERT [dbo].[karet_users] OFF
SET IDENTITY_INSERT [dbo].[karet_vessel] ON 

INSERT [dbo].[karet_vessel] ([id], [vesselcode], [vessel], [description], [isactive]) VALUES (1, N'600', N'600mL', N'<p>Vessel</p>', N'1')
INSERT [dbo].[karet_vessel] ([id], [vesselcode], [vessel], [description], [isactive]) VALUES (3, N'PETRIDISH', N'Petridish', N'<p>Petridish</p>', N'1')
INSERT [dbo].[karet_vessel] ([id], [vesselcode], [vessel], [description], [isactive]) VALUES (4, N'TESTTUBE', N'Testtube', N'<p>Testtube</p>', N'1')
INSERT [dbo].[karet_vessel] ([id], [vesselcode], [vessel], [description], [isactive]) VALUES (6, N'150', N'150ML', N'<p>Vessels</p>', N'1')
INSERT [dbo].[karet_vessel] ([id], [vesselcode], [vessel], [description], [isactive]) VALUES (7, N'100', N'150ML', N'<p>Vessel</p>', N'0')
INSERT [dbo].[karet_vessel] ([id], [vesselcode], [vessel], [description], [isactive]) VALUES (8, N'EEE', N'eee', NULL, N'0')
INSERT [dbo].[karet_vessel] ([id], [vesselcode], [vessel], [description], [isactive]) VALUES (9, N'115', N'115 ML', NULL, N'0')
INSERT [dbo].[karet_vessel] ([id], [vesselcode], [vessel], [description], [isactive]) VALUES (10, N'150XXL', N'XXL 150 ML', N'Blabla', N'0')
INSERT [dbo].[karet_vessel] ([id], [vesselcode], [vessel], [description], [isactive]) VALUES (11, N'150X', N'150MLXX', N'<p>Vessels</p>', N'1')
INSERT [dbo].[karet_vessel] ([id], [vesselcode], [vessel], [description], [isactive]) VALUES (12, N'150', N'150ML', N'<p>Vessels</p>', N'1')
INSERT [dbo].[karet_vessel] ([id], [vesselcode], [vessel], [description], [isactive]) VALUES (13, N'X123', N'ADAASDW', N'Vessel', N'1')
INSERT [dbo].[karet_vessel] ([id], [vesselcode], [vessel], [description], [isactive]) VALUES (14, N'VESEL TES 1', N'Vesel tes 1', N'test vesel  1', N'1')
SET IDENTITY_INSERT [dbo].[karet_vessel] OFF
SET IDENTITY_INSERT [dbo].[karet_worker] ON 

INSERT [dbo].[karet_worker] ([id], [initial], [description], [isactive], [status], [name], [kode_employee]) VALUES (1, N'RL', N'', 1, N'A', N'Rahmayani Lubis', N'2400146')
INSERT [dbo].[karet_worker] ([id], [initial], [description], [isactive], [status], [name], [kode_employee]) VALUES (2, N'DR', N'', 1, N'A', N'Darta Rudino', N'2400183')
INSERT [dbo].[karet_worker] ([id], [initial], [description], [isactive], [status], [name], [kode_employee]) VALUES (3, N'DS', N'', 1, N'A', N'Dede Suharman Purba', N'2400210')
INSERT [dbo].[karet_worker] ([id], [initial], [description], [isactive], [status], [name], [kode_employee]) VALUES (4, N'FF', N'', 1, N'A', N'Ferry Fadliansyah DMK', N'2405530')
INSERT [dbo].[karet_worker] ([id], [initial], [description], [isactive], [status], [name], [kode_employee]) VALUES (5, N'RAH', N'', 0, N'A', NULL, NULL)
INSERT [dbo].[karet_worker] ([id], [initial], [description], [isactive], [status], [name], [kode_employee]) VALUES (6, N'RS', N'', 1, N'A', N'Rumsiah', N'2400052')
INSERT [dbo].[karet_worker] ([id], [initial], [description], [isactive], [status], [name], [kode_employee]) VALUES (7, N'AR', N'', 1, N'A', N'Amran', N'2400054')
INSERT [dbo].[karet_worker] ([id], [initial], [description], [isactive], [status], [name], [kode_employee]) VALUES (8, N'AGS', N'', 1, N'', N'Agus sE', N'00123')
INSERT [dbo].[karet_worker] ([id], [initial], [description], [isactive], [status], [name], [kode_employee]) VALUES (9, N'IND', N'', 1, N'', N'Indah', N'121312')
SET IDENTITY_INSERT [dbo].[karet_worker] OFF
SET IDENTITY_INSERT [dbo].[master_pegawai] ON 

INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (1, N'admin_bb', N'ADMINISTRATOR', N'ac43724f16e9241d990427ab7c8f4228', N'Y', N'N', 1, NULL, 0, N'admin_bb', CAST(N'2019-12-10 22:24:14.000' AS DateTime), NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (2, N'A01', N'RUSDI', N'e10adc3949ba59abbe56e057f20f883e', N'N', N'N', 1, 0, 2, N'BBP001', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (3, N'', N'SUHENDRI', N'e10adc3949ba59abbe56e057f20f883e', N'N', N'N', 1, 2, 4, N'BBP002', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (4, N'', N'RENCIA GURNING', N'81dc9bdb52d04dc20036dbd8313ed055', N'N', N'N', 1, 2, 4, N'BBP003', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (5, N'', N'SUPRIANI', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP004', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (6, N'', N'MISPAWATI', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP005', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (7, N'', N'PUSPAWATI', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP006', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (8, N'', N'SITI ROHANI', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP007', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (9, N'', N'SITI ANISAH', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP008', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (10, N'', N'MEIRANI', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP009', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (11, N'', N'NURITA 1', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP010', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (12, N'', N'DEWI SIREGAR', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP011', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (13, N'', N'NURASIAH PANE', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP012', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (14, N'', N'BERLIANA', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP013', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (15, N'', N'SRI REZEKI', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP014', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (16, N'', N'SRI NOVITA DEWI', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP015', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (17, N'', N'HARIATI', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP016', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (18, N'', N'JULIAH', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP017', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (19, N'', N'ELFIDA HANI', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP018', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (20, N'', N'ENDANG', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP019', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (21, N'', N'DEWI EKA', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP020', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (22, N'', N'AYUNING WULANDARI', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP021', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (23, N'', N'KAMSIAH', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP022', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (24, N'', N'NOVITA HANUM', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP023', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (25, N'', N'MAULINDA', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP024', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (26, N'', N'RAHMYANTI', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP025', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (27, N'', N'NINA ISAINI', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP026', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (28, N'', N'SUSILAWATI', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP027', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (29, N'', N'SWASTI PRIHATINI', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP028', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (30, N'', N'RINI WAHYUNI', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP029', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (31, N'', N'TANTI SETIAWATI', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP030', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (32, N'', N'ERLI YENI', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP031', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (33, N'', N'NURAINUN LUBIS', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP032', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (34, N'', N'SRIANI', N'e10adc3949ba59abbe56e057f20f883e', N'Y', N'N', 1, 0, 4, N'BBP033', CAST(N'2019-05-16 12:58:37.000' AS DateTime), NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (35, N'', N'NOVITA HANDAYANI', N'e10adc3949ba59abbe56e057f20f883e', N'Y', N'N', 1, 0, 4, N'BBP034', CAST(N'2019-09-14 10:52:50.000' AS DateTime), NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (36, N'', N'INDAH PERMANA SURI', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP035', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (37, NULL, N'ARBAIYAH HZ', N'21232f297a57a5a743894a0e4a801fc3', NULL, N'N', 1, NULL, 4, N'BBP036', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (38, N'', N'SANDI LESMANA', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP037', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (39, N'', N'ELINDA', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP038', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (40, N'', N'SYAHRIAL', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP039', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (41, N'', N'MURIANTO', N'e10adc3949ba59abbe56e057f20f883e', N'Y', N'N', 1, 0, 4, N'BBP040', CAST(N'2019-05-16 10:01:39.000' AS DateTime), NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (42, N'', N'JUNAIDI', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP041', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (43, N'', N'SAHARIM', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP042', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (44, N'', N'MARATUA', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP043', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (45, N'', N'KARIM SIDIK', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP044', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (46, N'', N'HERIANTO', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 1, 0, 4, N'BBP045', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (47, N'', N'ANDI IRWANSYAH', N'e10adc3949ba59abbe56e057f20f883e', N'Y', N'N', 1, 0, 4, N'BBP046', CAST(N'2019-09-14 12:09:35.000' AS DateTime), NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (49, N'admin_al', N'ADMINISTRATOR', N'21232f297a57a5a743894a0e4a801fc3', N'Y', N'N', 2, NULL, 0, N'admin_al', CAST(N'2019-09-14 15:20:47.000' AS DateTime), NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (50, N'2500149', N'HAFOSAN PANDIANGAN', N'e10adc3949ba59abbe56e057f20f883e', N'N', N'N', 2, 51, 4, N'ALP001', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (51, N'2500151', N'RIDOANSYAH  ', N'e10adc3949ba59abbe56e057f20f883e', N'N', N'N', 2, 0, 4, N'ALP002', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (52, N'2500241', N'ALDI MARTUA RAJA  ', N'e10adc3949ba59abbe56e057f20f883e', N'N', N'N', 2, 73, 4, N'ALP003', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (53, N'2500245', N'Mahendry  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP004', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (54, N'2500246', N'Muhammad Fatuha Purb', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP005', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (55, N'2500287', N'M. Devy Syahputra  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP006', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (56, N'2500288', N'Supriadi  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 0, 4, N'ALP007', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (57, N'2500289', N'Saiful Bahri  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 0, 4, N'ALP008', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (58, N'2500290', N'Rahmad Kurniawan  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP009', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (59, N'2500291', N'Rudiono  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP010', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (60, N'2500292', N'Rico Andrian Ruben  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP011', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (61, N'2500293', N'Rani Susanto  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP012', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (62, N'2500294', N'Rahmad Riadi  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP013', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (63, N'2500295', N'Suheri Prianto  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP014', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (64, N'2500296', N'Syairwanto  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP015', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (65, N'2500297', N'Rahmat Hidayat Panja', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP016', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (66, N'2500298', N'Ari Hartama R. S.  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP017', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (67, N'2500299', N'M. Nur Jahari  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP018', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (68, N'2500300', N'Dian Azmi Siagian  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP019', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (69, N'2500301', N'Okta Yusniati P.  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP020', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (70, N'2500302', N'Rina  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP021', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (71, N'2500303', N'Sri Dewi Puspita Sar', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP022', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (72, N'2500304', N'Tri Astuti  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP023', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (73, N'2501119', N'Sutrisno I  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP024', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (74, N'2501161', N'Riduan Pasaribu  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP025', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (75, N'2501169', N'Dimas Surahman  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP026', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (76, N'2507255', N'Sumiati II  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP027', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (77, N'2507322', N'Asiamiah  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP028', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (78, N'2507399', N'Vera Ernita  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP029', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (79, N'2507508', N'Mariyah  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP030', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (80, N'2507530', N'Loli Khatarina  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP031', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (81, N'2507538', N'Sukestina B  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP032', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (82, N'2507549', N'Suwarseh  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP033', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (83, N'2507575', N'Sumiatik I  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP034', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (84, N'2507621', N'Hawani Pasaribu  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP035', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (85, N'2507630', N'Indah Mawati  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP036', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (86, N'2507635', N'Sriverawati  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP037', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (87, N'2507637', N'Fitriani  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP038', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (88, N'2507638', N'Lisfidiawati  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP039', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (89, N'2507639', N'Rubinem  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP040', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (90, N'2507640', N'Yusti  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 0, 4, N'ALP041', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (91, N'2507646', N'Nurhafni Pane  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP042', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (92, N'2507647', N'Santi II  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP043', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (93, N'2507652', N'Fenny Fena Linda Gin', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP044', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (94, N'2507655', N'Rina Susanti  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP045', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (95, N'2507658', N'Nurbeti  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP046', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (96, N'2507670', N'Suryaningsih  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP047', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (97, N'2507671', N'Santi Wahyuni  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP048', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (98, N'2507688', N'Jana  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP049', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (99, N'2507689', N'Astuti Wardianti  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP050', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (100, N'2507694', N'Henny Nuraisyah  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP051', NULL, NULL)
GO
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (101, N'2507699', N'Misriani  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP052', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (102, N'2507701', N'Susi  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 90, 4, N'ALP053', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (103, N'2507702', N'Sarah  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 0, 4, N'ALP054', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (104, N'2507703', N'Yunita Roya  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP055', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (105, N'2507707', N'Annesia Putri  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP056', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (106, N'2509796', N'Surono  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP057', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (107, N'2509975', N'Muhammad Yunus  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP058', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (108, N'2509977', N'Miyanto  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP059', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (109, N'2509978', N'Mangatur Sirait  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP060', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (110, N'2509979', N'Janson Sijabat  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP061', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (111, N'2509980', N'Surianto II  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP062', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (112, N'2509981', N'Arryanto  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP063', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (113, N'2509982', N'Sarma  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP064', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (114, N'2509983', N'Sugiono  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP065', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (115, N'2509984', N'Ismu  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP066', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (116, N'2509985', N'Muhammad Adlan Sinag', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP067', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (117, N'2509986', N'Jumanto  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP068', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (118, N'2509987', N'Rahman II  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP069', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (119, N'2509988', N'Sarno I  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP070', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (120, N'2509989', N'Kaslan  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP071', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (121, N'2509990', N'Sarino  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP072', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (122, N'2509991', N'Waldiman  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP073', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (123, N'2509992', N'Agus Salim Ritonga  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 0, 4, N'ALP074', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (124, N'2509993', N'Subandi II  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP075', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (125, N'2509994', N'Suprianto I  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP076', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (126, N'2509995', N'Gianto  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP077', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (127, N'2509996', N'Lian Sagita  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP078', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (128, N'2509997', N'Muhammad Rapi  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP079', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (129, N'2509998', N'Ibnu Hajar I  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP080', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (130, N'2509999', N'Riadi  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP081', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (131, N'2510000', N'Suheri  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 0, 4, N'ALP082', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (132, N'2510001', N'Ngadimun  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP083', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (133, N'2510002', N'Sunardi III  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP084', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (134, N'2510003', N'Aswan Tahir  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP085', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (135, N'2510004', N'Muhammad Iswandi  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP086', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (136, N'2510005', N'Mariono I  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 0, 4, N'ALP087', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (137, N'2510006', N'Rusman III  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP088', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (138, N'2510007', N'Subardi  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP089', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (139, N'2510008', N'Kasim Sirait  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP090', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (140, N'2510009', N'Suhendri  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP091', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (141, N'2510010', N'Muklis Akbar Hasibua', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP092', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (142, N'2510011', N'Riono  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP093', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (143, N'2510012', N'Irwan Syahputra  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP094', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (144, N'2510013', N'Sariman II  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 90, 4, N'ALP095', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (145, N'2510014', N'Suji Arto  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP096', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (146, N'2510015', N'Jumali III  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP097', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (147, N'2510016', N'Ahmad Andi  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP098', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (148, N'2510017', N'Feri Irawan  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 0, 4, N'ALP099', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (149, N'2510018', N'Chairul Anwar Lubis ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP100', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (150, N'2510019', N'Surianto III  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP101', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (151, N'2510020', N'Muhammad Salim  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP102', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (152, N'2510021', N'Syahruddin Sitepu  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP103', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (153, N'2510022', N'Budi Ilmi Wijaya  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP104', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (154, N'2510023', N'Faisal  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 0, 4, N'ALP105', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (155, N'2510024', N'Hadi Surya  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP106', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (156, N'2510025', N'Irwansyah Sinaga  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP107', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (157, N'2510026', N'Khairil Anwar  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 0, 4, N'ALP108', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (158, N'2510027', N'Supriadi I  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP109', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (159, N'2510028', N'Bambang Subroto  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP110', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (160, N'2510029', N'Tomy Haryono  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP111', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (161, N'2510030', N'Christina Naibaho  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP112', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (162, N'2510031', N'Hariadi  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 0, 4, N'ALP113', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (163, N'2510033', N'Hermasyah Sitepu  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP114', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (164, N'2510034', N'Jepri Mawanto  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP115', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (165, N'2510035', N'Surya Hadi  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP116', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (166, N'2510036', N'Edo Prasetyo  ', N'e10adc3949ba59abbe56e057f20f883e', N'Y', N'N', 2, 0, 4, N'ALP117', CAST(N'2019-02-08 15:51:16.000' AS DateTime), NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (167, N'2510037', N'Fajar Basuri Ibrahim', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP118', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (168, N'2510038', N'Muhammad Candra Muli', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP119', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (169, N'2510039', N'Hardi Pramana  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP120', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (170, N'2510040', N'Rudi Yuandra  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP121', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (171, N'2510041', N'Amat Budiman  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP122', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (172, N'2510042', N'Andries Pamilian  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 0, 4, N'ALP123', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (173, N'2510043', N'Tajuddin Siagian  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 0, 4, N'ALP124', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (174, N'2510044', N'Marjunis Goldman Sim', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP125', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (175, N'2510045', N'Yudi Syahputra  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP126', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (176, N'2510046', N'Hermanto  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP127', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (177, N'2510047', N'Suriyawan Nasution  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP128', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (178, N'2510048', N'Endra Natanail Sitep', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP129', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (179, N'2510049', N'Muhammad Ali Wardana', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP130', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (180, N'2510050', N'Julfin Sri Widodo  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP131', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (181, N'2510052', N'Syahputra  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP132', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (182, N'2510053', N'Ngatino Chandra  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP133', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (183, N'2510054', N'Zulfikar  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP134', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (184, N'2510055', N'Sri Astuti  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP135', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (185, N'2510056', N'Rati Kumala Dewi Wij', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 0, 4, N'ALP136', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (186, N'2510057', N'Siti Mahdian  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP137', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (187, N'2510058', N'Dewi Fitria Ningsih ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP138', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (188, N'2510059', N'Nurjannah Batubara  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP139', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (189, N'2510060', N'Naini Anggraini  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP140', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (190, N'2510061', N'Juan Khara Sari  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP141', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (191, N'2510062', N'Sri Wahyuni  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 0, 4, N'ALP142', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (192, N'2510063', N'Suri Muliani Purba  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 0, 4, N'ALP143', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (193, N'2510064', N'Sapriani  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 0, 4, N'ALP144', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (194, N'2510065', N'Hera Fitriani  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP145', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (195, N'2510066', N'Suriani  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP146', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (196, N'2510067', N'Leni Susanti  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP147', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (197, N'2510068', N'Heriyanti  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP148', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (198, N'2510069', N'Tri Asmayawati  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP149', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (199, N'2510070', N'Ayu Lestari  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP150', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (200, N'2510071', N'Nanda Ari Mukti  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP151', NULL, NULL)
GO
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (201, N'2510072', N'Tantri Hariya Syafit', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP152', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (202, N'2510073', N'Nurhidayah Cahya Kus', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP153', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (203, N'2510074', N'Juliana Sihombing  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP154', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (204, N'2510075', N'Arika Safridayati  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP155', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (205, N'2510076', N'Khairun Nisa Sitepu ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP156', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (206, N'2510077', N'Nur Sahara Br Siahaa', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP157', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (207, N'2510078', N'Gunadi Syaputra  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP158', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (208, N'2510079', N'Ponirin  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP159', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (209, N'2510080', N'Edi Syahputra  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP160', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (210, N'2510081', N'M. Rizki Siregar  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP161', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (211, N'2510082', N'Imam Sandi  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP162', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (212, N'2510083', N'Makmur Siregar  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP163', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (213, N'2510084', N'Fickry Zulmyardi  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 0, 4, N'ALP164', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (214, N'2510085', N'Mhd. Prya Lesmana  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 0, 4, N'ALP165', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (215, N'2510086', N'M. Zulhandi Patikawa', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP166', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (216, N'2510087', N'Sartono  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP167', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (217, N'2510088', N'Sugeng Riadi  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP168', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (218, N'2510089', N'Bambang Ardiansyah  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 0, 4, N'ALP169', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (219, N'2510090', N'Irwandi  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, 0, 4, N'ALP170', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (220, N'2510091', N'M. Darma Syahputra  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP171', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (221, N'2510093', N'Murni I  ', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'N', 2, NULL, 4, N'ALP172', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (222, N'', N'TOTAL ALSP', N'e10adc3949ba59abbe56e057f20f883e', NULL, N'Y', 2, NULL, 4, N'ALP173', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (223, N'', N'SUTRISNI', N'e10adc3949ba59abbe56e057f20f883e', N'N', N'N', 2, 0, 4, N'ALP174', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (224, N'', N'IRFAN SOCFINDO MEDAN', N'e10adc3949ba59abbe56e057f20f883e', N'Y', N'N', 1, 0, 1, N'irfan', CAST(N'2019-09-07 08:48:51.000' AS DateTime), N'Y')
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (225, N'', N'DADANG AFANDI', N'e10adc3949ba59abbe56e057f20f883e', N'Y', N'N', 1, 0, 1, N'dadang', CAST(N'2019-09-14 13:51:02.000' AS DateTime), NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (226, N'', N'PAIDI', N'e10adc3949ba59abbe56e057f20f883e', N'N', N'N', 1, 0, 2, N'paidi', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (227, N'', N'BOWO SUTEJO', N'81dc9bdb52d04dc20036dbd8313ed055', N'N', N'N', 1, 0, 3, N'bowo', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (228, N'', N'JONATAN', N'e10adc3949ba59abbe56e057f20f883e', N'Y', N'N', 1, 0, 1, N'jonatan', CAST(N'2019-09-14 13:53:20.000' AS DateTime), N'Y')
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (229, N'', N'AHMADI', N'e10adc3949ba59abbe56e057f20f883e', N'N', N'N', 1, 0, 2, N'BBP047', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (230, N'', N'AAN ABDAOE LUBIS', N'e10adc3949ba59abbe56e057f20f883e', N'N', N'N', 1, 229, 4, N'BBP048', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (231, N'', N' INDRA SYAHPUTRA', N'81dc9bdb52d04dc20036dbd8313ed055', N'N', N'Y', 1, 0, 1, N'PI', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (232, N'', N'NURHOLILAH SIREGAR', N'e10adc3949ba59abbe56e057f20f883e', N'Y', N'N', 1, 0, 3, N'Lila', CAST(N'2019-08-19 07:44:29.000' AS DateTime), NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (233, N'', N'RAHMAYANI', N'e10adc3949ba59abbe56e057f20f883e', N'Y', N'N', 1, 0, 4, N'maya', CAST(N'2019-09-14 09:16:58.000' AS DateTime), NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (234, N'', N'ZULKIFLI LUBIS', N'5c689f824a9612ffa3f8c613bbe217aa', N'N', N'Y', 1, 0, 1, N'staff', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (235, N'', N'ZULKIFLI LUBIS', N'e10adc3949ba59abbe56e057f20f883e', N'Y', N'N', 1, 0, 1, N'ZULKIFLI', CAST(N'2019-05-02 07:02:22.000' AS DateTime), NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (236, N'', N'IRFAN AZHARI', N'e10adc3949ba59abbe56e057f20f883e', N'Y', N'N', 2, 0, 1, N'adminalsp', CAST(N'2019-09-04 16:55:34.000' AS DateTime), NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (237, N'', N'SAMSIR', N'e10adc3949ba59abbe56e057f20f883e', N'N', N'N', 1, 0, 4, N'BBP049', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (238, NULL, N'Lab DNA', N'a656eb1906e7db83744126d08f1c650b', N'Y', N'N', NULL, NULL, NULL, N'labdna', CAST(N'2019-09-14 13:04:50.000' AS DateTime), N'Y')
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (239, N'', N'DIAN S PURBA', N'e10adc3949ba59abbe56e057f20f883e', N'N', N'N', 1, 0, 4, N'BBP050', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (240, N'', N'JOSI', N'e10adc3949ba59abbe56e057f20f883e', N'N', N'N', 2, 0, 1, N'josi', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (241, N'', N'WAHYUDI AMBARITA', N'81dc9bdb52d04dc20036dbd8313ed055', N'N', N'N', 1, 0, 1, N'WA', NULL, NULL)
INSERT [dbo].[master_pegawai] ([id], [kode_employee], [nama], [password], [statusLogin], [statusHapus], [idUnit], [idAtasan], [idJabatan], [kode], [lastLogin], [dna]) VALUES (242, N'', N'INDRA SYAHPUTRA', N'81dc9bdb52d04dc20036dbd8313ed055', N'N', N'N', 1, 0, 1, N'HPI', NULL, NULL)
SET IDENTITY_INSERT [dbo].[master_pegawai] OFF
SET IDENTITY_INSERT [dbo].[master_pegawaibidang] ON 

INSERT [dbo].[master_pegawaibidang] ([id], [id_pegawai], [id_unit], [id_bidang], [kodepegawai], [statusAktif]) VALUES (4, 52, 2, 3, N'PA8', N'Y')
INSERT [dbo].[master_pegawaibidang] ([id], [id_pegawai], [id_unit], [id_bidang], [kodepegawai], [statusAktif]) VALUES (6, 3, 1, 3, N'R01', N'Y')
INSERT [dbo].[master_pegawaibidang] ([id], [id_pegawai], [id_unit], [id_bidang], [kodepegawai], [statusAktif]) VALUES (7, 3, 1, 3, N'K01', N'Y')
INSERT [dbo].[master_pegawaibidang] ([id], [id_pegawai], [id_unit], [id_bidang], [kodepegawai], [statusAktif]) VALUES (9, 2, 1, 3, N'P17', N'Y')
INSERT [dbo].[master_pegawaibidang] ([id], [id_pegawai], [id_unit], [id_bidang], [kodepegawai], [statusAktif]) VALUES (10, 3, 1, 3, N'E01', N'Y')
INSERT [dbo].[master_pegawaibidang] ([id], [id_pegawai], [id_unit], [id_bidang], [kodepegawai], [statusAktif]) VALUES (11, 229, 1, 2, N'P15', N'Y')
INSERT [dbo].[master_pegawaibidang] ([id], [id_pegawai], [id_unit], [id_bidang], [kodepegawai], [statusAktif]) VALUES (12, 35, 1, 4, N'', N'Y')
SET IDENTITY_INSERT [dbo].[master_pegawaibidang] OFF
INSERT [dbo].[master_pegawaijabatan] ([id], [nama], [statusHapus]) VALUES (1, N'Staff', N'N')
INSERT [dbo].[master_pegawaijabatan] ([id], [nama], [statusHapus]) VALUES (2, N'Mandor', N'N')
INSERT [dbo].[master_pegawaijabatan] ([id], [nama], [statusHapus]) VALUES (3, N'Pegawai', N'N')
INSERT [dbo].[master_pegawaijabatan] ([id], [nama], [statusHapus]) VALUES (4, N'Pekerja', N'N')
SET IDENTITY_INSERT [dbo].[pekerja] ON 

INSERT [dbo].[pekerja] ([id], [idmandor], [kodepekerja], [namapekerja], [status], [isactive], [idunit]) VALUES (1, N'1', N'P30', N'MULAJI', N'A', N'1', N'BB')
INSERT [dbo].[pekerja] ([id], [idmandor], [kodepekerja], [namapekerja], [status], [isactive], [idunit]) VALUES (2, N'1', N'P35', N'JAMILUDDIN', N'A', N'1', N'BB')
INSERT [dbo].[pekerja] ([id], [idmandor], [kodepekerja], [namapekerja], [status], [isactive], [idunit]) VALUES (3, N'2', N'P37', N'JULPAN', N'A', N'1', N'BB')
INSERT [dbo].[pekerja] ([id], [idmandor], [kodepekerja], [namapekerja], [status], [isactive], [idunit]) VALUES (4, N'2', N'P38', N'ZAMHIR', N'A', N'1', N'BB')
INSERT [dbo].[pekerja] ([id], [idmandor], [kodepekerja], [namapekerja], [status], [isactive], [idunit]) VALUES (5, N'2', N'P54', N'IRWANSYAH', N'A', N'1', N'BB')
INSERT [dbo].[pekerja] ([id], [idmandor], [kodepekerja], [namapekerja], [status], [isactive], [idunit]) VALUES (6, N'1', N'P55', N'SUYADI', N'A', N'1', N'BB')
INSERT [dbo].[pekerja] ([id], [idmandor], [kodepekerja], [namapekerja], [status], [isactive], [idunit]) VALUES (7, N'1', N'P63', N'ISWANTO', N'A', N'1', N'BB')
INSERT [dbo].[pekerja] ([id], [idmandor], [kodepekerja], [namapekerja], [status], [isactive], [idunit]) VALUES (8, N'2', N'P103', N'YULANDI', N'A', N'1', N'BB')
INSERT [dbo].[pekerja] ([id], [idmandor], [kodepekerja], [namapekerja], [status], [isactive], [idunit]) VALUES (9, N'2', N'P105', N'DIAN RAMDANI', N'A', N'1', N'BB')
INSERT [dbo].[pekerja] ([id], [idmandor], [kodepekerja], [namapekerja], [status], [isactive], [idunit]) VALUES (10, N'3', N'P62', N'ABD.MUIS', N'A', N'1', N'BB')
INSERT [dbo].[pekerja] ([id], [idmandor], [kodepekerja], [namapekerja], [status], [isactive], [idunit]) VALUES (11, N'3', N'P87', N'M.ALFAN', N'A', N'1', N'BB')
INSERT [dbo].[pekerja] ([id], [idmandor], [kodepekerja], [namapekerja], [status], [isactive], [idunit]) VALUES (12, N'2', N'P32', N'RUDI HARDANA', N'A', N'1', N'BB')
INSERT [dbo].[pekerja] ([id], [idmandor], [kodepekerja], [namapekerja], [status], [isactive], [idunit]) VALUES (13, N'2', N'P79', N'KAMALUDDIN', N'TA', N'1', N'BB')
INSERT [dbo].[pekerja] ([id], [idmandor], [kodepekerja], [namapekerja], [status], [isactive], [idunit]) VALUES (14, N'2', N'P28', N'AGUS SALIM', N'TA', N'1', N'BB')
INSERT [dbo].[pekerja] ([id], [idmandor], [kodepekerja], [namapekerja], [status], [isactive], [idunit]) VALUES (15, N'2', N'P83', N'M.SALIM', N'TA', N'1', N'BB')
INSERT [dbo].[pekerja] ([id], [idmandor], [kodepekerja], [namapekerja], [status], [isactive], [idunit]) VALUES (16, N'3', N'P36', N'SUWANDI', N'TA', N'1', N'BB')
INSERT [dbo].[pekerja] ([id], [idmandor], [kodepekerja], [namapekerja], [status], [isactive], [idunit]) VALUES (17, N'4', N'P108', N'AAN ABDA''OE', N'A', N'1', N'BB')
INSERT [dbo].[pekerja] ([id], [idmandor], [kodepekerja], [namapekerja], [status], [isactive], [idunit]) VALUES (18, N'4', N'P34', N'RINALDI', N'A', N'1', N'BB')
INSERT [dbo].[pekerja] ([id], [idmandor], [kodepekerja], [namapekerja], [status], [isactive], [idunit]) VALUES (19, N'6', N'P81', N'MAULIDANI', N'A', N'1', N'BB')
SET IDENTITY_INSERT [dbo].[pekerja] OFF
INSERT [dbo].[setting] ([id], [namaAplikasi], [logo]) VALUES (1, N'SSPL Integrated System', N'logo.gif')
SET IDENTITY_INSERT [dbo].[unit] ON 

INSERT [dbo].[unit] ([id], [kodeunit], [nama], [alamat], [noTelepon], [email], [statusAktif]) VALUES (1, N'BB', N'Bangun Bandar', N'Dolok Masihol', N'-', N'sspl@socfindo.com', N'Y')
INSERT [dbo].[unit] ([id], [kodeunit], [nama], [alamat], [noTelepon], [email], [statusAktif]) VALUES (2, N'AL', N'Aek Loba', N'Aek Loba', N'-', N'aekloba@socfindo.co.id', N'Y')
INSERT [dbo].[unit] ([id], [kodeunit], [nama], [alamat], [noTelepon], [email], [statusAktif]) VALUES (3, N'LB', N'Lae Butar', NULL, NULL, NULL, N'Y')
INSERT [dbo].[unit] ([id], [kodeunit], [nama], [alamat], [noTelepon], [email], [statusAktif]) VALUES (4, N'MP', N'Mata Pao', NULL, NULL, NULL, N'Y')
INSERT [dbo].[unit] ([id], [kodeunit], [nama], [alamat], [noTelepon], [email], [statusAktif]) VALUES (5, N'SG', N'Seunagan', NULL, NULL, NULL, N'Y')
INSERT [dbo].[unit] ([id], [kodeunit], [nama], [alamat], [noTelepon], [email], [statusAktif]) VALUES (6, N'SL', N'Sei Liput', NULL, NULL, NULL, N'Y')
INSERT [dbo].[unit] ([id], [kodeunit], [nama], [alamat], [noTelepon], [email], [statusAktif]) VALUES (7, N'TG', N'Tanah Gambus', NULL, NULL, NULL, N'Y')
SET IDENTITY_INSERT [dbo].[unit] OFF
SET IDENTITY_INSERT [dbo].[unit_bidang] ON 

INSERT [dbo].[unit_bidang] ([id], [nama]) VALUES (1, N'Breeding')
INSERT [dbo].[unit_bidang] ([id], [nama]) VALUES (2, N'Seed Production Panen')
INSERT [dbo].[unit_bidang] ([id], [nama]) VALUES (3, N'Seed Production LBK')
INSERT [dbo].[unit_bidang] ([id], [nama]) VALUES (4, N'Seed Production Germinator')
INSERT [dbo].[unit_bidang] ([id], [nama]) VALUES (5, N'DNA')
INSERT [dbo].[unit_bidang] ([id], [nama]) VALUES (6, N'Kultur Jaringan Karet')
INSERT [dbo].[unit_bidang] ([id], [nama]) VALUES (7, N'Kultur Jaringan Sawit')
INSERT [dbo].[unit_bidang] ([id], [nama]) VALUES (8, N'Patologi')
INSERT [dbo].[unit_bidang] ([id], [nama]) VALUES (9, N'Premi')
SET IDENTITY_INSERT [dbo].[unit_bidang] OFF
INSERT [dbo].[user_role] ([user_id], [role_id]) VALUES (1, 1)
INSERT [dbo].[user_role] ([user_id], [role_id]) VALUES (5, 2)
ALTER TABLE [dbo].[user_role]  WITH NOCHECK ADD  CONSTRAINT [user_role$FK_2DE8C6A3A76ED395] FOREIGN KEY([user_id])
REFERENCES [dbo].[app_users] ([id])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[user_role] CHECK CONSTRAINT [user_role$FK_2DE8C6A3A76ED395]
GO
ALTER TABLE [dbo].[user_role]  WITH NOCHECK ADD  CONSTRAINT [user_role$FK_2DE8C6A3D60322AC] FOREIGN KEY([role_id])
REFERENCES [dbo].[app_roles] ([id])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[user_role] CHECK CONSTRAINT [user_role$FK_2DE8C6A3D60322AC]
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sspl.app_roles' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'app_roles'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sspl.app_users' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'app_users'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sspl.pekerja' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'pekerja'
GO
EXEC sys.sp_addextendedproperty @name=N'MS_SSMA_SOURCE', @value=N'sspl.user_role' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'user_role'
GO
