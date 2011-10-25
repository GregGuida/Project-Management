//
//  CategoryTableCell.m
//  TFMMobile
//
//  Created by Sean Dunn on 10/23/11.
//  Copyright (c) 2011 Marist College. All rights reserved.
//

#import "CategoryTableCell.h"

@implementation CategoryTableCell

@synthesize categoryImage,
            categoryName,
            categoryCount;

- (id)initWithStyle:(UITableViewCellStyle)style reuseIdentifier:(NSString *)reuseIdentifier
{
    self = [super initWithStyle:style reuseIdentifier:reuseIdentifier];
    if (self) {
       
    }
    
    return self;
}

- (void)setSelected:(BOOL)selected animated:(BOOL)animated
{
    [super setSelected:selected animated:animated];

    // Configure the view for the selected state
}

@end
