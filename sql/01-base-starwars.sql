
CREATE TABLE [dbo].[sw_planet](
	[id] [int] NOT NULL,
	[name] [nvarchar](50) NOT NULL,
 CONSTRAINT [PK_sw_planet] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO




CREATE TABLE [dbo].[sw_people](
	[id] [int] NOT NULL,
	[name] [nvarchar](50) NULL,
	[height] [decimal](10, 2) NULL,
	[mass] [decimal](10, 2) NULL,
	[hair_color] [nchar](10) NULL,
	[skin_color] [nchar](10) NULL,
	[eye_color] [nchar](10) NULL,
	[birth_year] [int] NULL,
	[gender] [nchar](10) NULL,
	[homeworld] [int] NOT NULL,
	[created] [datetime] NULL,
	[edited] [datetime] NULL,
 CONSTRAINT [PK_sw_people] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[sw_people]  WITH CHECK ADD  CONSTRAINT [FK_sw_people_sw_planet] FOREIGN KEY([homeworld])
REFERENCES [dbo].[sw_planet] ([id])
GO

ALTER TABLE [dbo].[sw_people] CHECK CONSTRAINT [FK_sw_people_sw_planet]
GO

