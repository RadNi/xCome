import unittest

from selenium import webdriver
from test_utility import static_data, fields


class Information(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()
        self.address = "user/information"

    def test_user_inf(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        fields.get_components_by_name(driver, ["phonenumber=09398604014", "avatar=m.jpg", "password=1234",
                                               "ret-password=1234", "email=smjfas@gmail.com",
                                               "change"])[5].click()

        assert driver.find_element_by_id("successful") is not None


    def tearDown(self):
        self.driver.close()
