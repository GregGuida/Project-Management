//
//  DefaultViewController.m
//  TFMMobile
//
//  Created by Sean Dunn on 10/23/11.
//  Copyright (c) 2011 Marist College. All rights reserved.
//

#import "DefaultViewController.h"

@implementation DefaultViewController

@synthesize logoImage;

- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil
{
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    if (self) {
        
    }
    return self;
}

#pragma mark - Memory Warning

- (void)didReceiveMemoryWarning
{
    // Releases the view if it doesn't have a superview.
    [super didReceiveMemoryWarning];
    
    // Release any cached data, images, etc that aren't in use.
}

#pragma mark - View lifecycle

// Implement loadView to create a view hierarchy programmatically, without using a nib.
/*
- (void)loadView {
    
}
 */

- (void)viewWillAppear:(BOOL)animated {
    [self.navigationController.navigationBar addSubview:self.logoImage];
}

- (void)viewWillDisappear:(BOOL)animated {
    [self.logoImage removeFromSuperview];
}

- (void)viewDidAppear:(BOOL)animated {
    self.navigationController.navigationBarHidden = NO;
}

- (void)viewDidLoad {
    [super viewDidLoad];
    UIImage *image = [UIImage imageWithData:[NSData dataWithContentsOfURL:[NSURL URLWithString:@"http://placekitten.com/320/46"]]];
    self.logoImage = [[UIImageView alloc] initWithImage:image];
}


- (void)viewDidUnload
{
    [super viewDidUnload];
    // Release any retained subviews of the main view.
    // e.g. self.myOutlet = nil;
}

- (BOOL)shouldAutorotateToInterfaceOrientation:(UIInterfaceOrientation)interfaceOrientation
{
    // Return YES for supported orientations
    return (interfaceOrientation == UIInterfaceOrientationPortrait);
}

@end