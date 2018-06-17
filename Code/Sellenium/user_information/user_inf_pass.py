import unittest

from selenium import webdriver
from test_utility import static_data, fields


class UserInformation(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_user_inf_pass_mismatch(self):
        driver = self.driver
        driver.get(static_data.base_url + "user/information")
        fields.get_components_by_name(driver, ["phonenumber=09398604014", "avatar=m.jpg", "password=1234",
                                               "ret-password=12234", "email=smjfas@gmail.com",
                                               "change"])[5].click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
