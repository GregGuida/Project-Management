//
//  CategoryTableCell.h
//  TFMMobile
//
//  Created by Sean Dunn on 10/23/11.
//  Copyright (c) 2011 Marist College. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface CategoryTableCell : UITableViewCell {
    IBOutlet UIImageView *categoryImage;
    IBOutlet UILabel *categoryName;
    IBOutlet UILabel *categoryCount;
}

@property(nonatomic, strong) IBOutlet UIImageView *categoryImage;
@property(nonatomic, strong) IBOutlet UILabel *categoryName;
@property(nonatomic, strong) IBOutlet UILabel *categoryCount;

@end
